<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Desk;
use App\Models\Bookings;
use App\Models\User;
use Illuminate\Validation\Rules\Can;

use function PHPUnit\Framework\returnValue;

class BookingBehalf extends Component
{
    public $availableDeskCount;

    public $bookedCount;
    public $notAvailableCount;
    public $selectedUserID;

    public $date;
    public $floor = "1";
    public $selectedDesk ='-';
    public $bookedDesk = '-';

    public $selectedDeskID;

    public $bookedDeskIDs = [];
    public $userBooking = [];
    public $canBook;

    public $max;
    public $min;
    
    public $showConfirmation = false;
    public $showNotification = false;
    public $showWarning = false;
    public $showWarning2 = false;
    

    public function mount() {
        $this->availableDeskCount = Desk::where('status', 'in_use')->count();
        $this->notAvailableCount = Desk::where('status', 'not_available')->count();
        $this->bookedCount = Bookings::where('status', 'accepted')->count();
    }
    public function refreshMap() 
    {
        $date = $this->date;
        $floor = $this->floor;
        $user = $this->selectedUserID;
        $desks = Desk::all(); 
        $canBook = $this->canBook;
        

        /** Reset selectedDesk if DATE/FLOOR is CHANGED or if DATE is CLEARED (i.e. user cleared the date.) */
        $this->selectedDesk = '-';
        $this->bookedDesk ='-';
        $this->selectedUser = '-';

        /**
         * Check IF there is a date and floor selected
         * ELSE, return NOTHING
         */
        if($this->date && $this->floor){

        
            // Access all Bookings
            $tmpBookings = Bookings::all();

            /** 
             * Get the id, desk_id, and booking_date of all rows
             *     in DB bookings_table
             *     and store to an array.
            */

            // 1st array
            $bookings = [];

            foreach ($tmpBookings as $booking){
                array_push($bookings, [
                    'id' => $booking->id,
                    'user_id' => $booking->user_id,
                    'desk_id' => $booking->desk_id,
                    'booking_date' => $booking->booking_date
                    ]
                );
            }

            /**
             * Find user_id that are same as the current user's
             * if true,
             *     store in an array.
             */

            /** 
             * Find booking_dates that are same as the selected date,
             * if true,
             *    check the selected floor level,
             *    then GET and STORE the desk_ids in an array.
            */


            // 2nd array
            $bookedDeskIDs = [];
            
            $canBook = true;

            // Access each row of $bookings.
            for ($booking = 0; $booking <= count($bookings) - 1 ; $booking++){

                // Access its user_id
                $bookingUserID = $bookings[$booking]['user_id'];
                $bookingDate = $bookings[$booking]['booking_date'];

                if ($date == $bookingDate){
  
                    if($floor == 1){
                        if ($bookings[$booking]['desk_id'] <= 36){
                            array_push($bookedDeskIDs, $bookings[$booking]['desk_id']);
                        }
                    }
                    elseif($floor == 2){
                        if ($bookings[$booking]['desk_id'] >= 37){
                            array_push($bookedDeskIDs, $bookings[$booking]['desk_id']);
                        }
                    }

                    if ($user != $bookingUserID){
                        $canBook = true;
                    }
                    elseif ($user == $bookingUserID){
                        // dd($bookings[$booking]['desk_id'] - 1);
                        $deskNum = $bookings[$booking]['desk_id'] - 1;
                        // dd($deskNum);
                        array_push($this->userBooking, [
                            'user_id' => $bookings[$booking]['user_id'],
                            'desk_num' => $desks[$deskNum]['desk_num'],
                            'booking_date' => $bookings[$booking]['booking_date'],
                        ]);
                        $canBook = false;
                        break;
                    }
                    
                }
            };

            $this->bookedDeskIDs = $bookedDeskIDs;

            
            $this->canBook = $canBook;
            
            
            // dd('User\'s Bookings today:', $this->userBooking, $canBook); 
        }  
    }

    public function clickDesk($key)
    {
        $desks = Desk::all();

        /** Can't click if there's NO DATE && FLOOR */
        if($this->date && $this->floor){
            
            /** Check if the Desk Selected is 'in_use' */ 
            if($desks[$key]->status == 'in_use')
            {
                /** Check if it is NOT BOOKED */
                if(!in_array($desks[$key]->id, $this->bookedDeskIDs))
                {
                    /** Then finally, assign the $selectedDesk as the Desk Selected */ 
                    $this->selectedDesk = $desks[$key]->desk_num;
                    $this->selectedDeskID = $desks[$key]->id;
                }
    
                elseif(in_array($desks[$key]->id, $this->bookedDeskIDs))
                {
                    // dd('it\'s booked bruh');
                    $this->bookedDesk = $desks[$key]->desk_num;
                    $this->showWarning2 = true;
                }
            }
    
            else
            {
                // dd('it\'s like broken eh..');
            }
        }





        // if ($desks[$key]->statuses_id == '1'){
        //     $this->selectedDesk = $desks[$key]->desk_num;
        //     // dd('sige, go.');
        // }
        // else if ($desks[$key]->statuses_id == '2'){
        //     dd('is booked bruh');
        // }
        // else {
        //     dd('sira \'to');
        // }
    }

    public function validateBooking()
    {
        $date = $this->date;
        $floor = $this->floor;
        $selectedDesk = $this->selectedDesk; 
        $user = $this->selectedUserID;

        $canBook = $this->canBook;

        if ($canBook && ($date && $floor && ($selectedDesk != '-') && $user))
        {
            $this->showConfirmation = true;
        }
        elseif ($canBook === false && ($date && $floor && ($selectedDesk != '-')  && $user))
        {
            $this->showWarning = true;
        }
        // dd($this->showConfirmation);
    }

    public function closeModal()
    {
        $this->showConfirmation = false;  
        $this->showNotification = false;  
        $this->showWarning = false;
        $this->showWarning2 = false;
    }

    public function goHome()
    {
        $this->showNotification = false;

        $this->redirect('/dashboard');
    }

    public function book()
    {
        $date = $this->date;
        $floor = $this->floor;
        $selectedDesk = $this->selectedDesk;
        $selectedDeskID = $this->selectedDeskID;

        $user = $this->selectedUserID;

        if ($date && $floor && ($selectedDesk != '-')) {

            Bookings::create([
                "booking_date" => $date,
                "status" => 'accepted',
                "user_id" => $user,
                "desk_id" => $selectedDeskID,
            ]);

            $this->selectedDesk = '-';
            $this->bookedDesk = '-';
            $this->showNotification = true;
            $this->refreshMap(); 
        }



        // $status = "booked";

        // Booking::create([
        //     "booking_date" => $this->date,    /** This whole block doesn't work yet.. */
        //     "status" => $status,            
        //     "user_id" => Auth::user(),
        //     // "desk_id" => 101,
        // ]);

        // dd($status); 
    }

    public function render()
    {
        $usersWithRoles = User::with('roles')->get();
        $desks = Desk::all();

        $this->max = Carbon::today()->addDays(14)->toDateString();
        $max = $this->max;

        $this->min= Carbon::today()->toDateString();
        $min = $this->min;



        return view('livewire.booking-behalf', compact('desks', 'max', 'min', 'usersWithRoles'));
    }
}
