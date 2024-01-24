<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Desk;
use App\Models\Bookings;
use Illuminate\Validation\Rules\Can;

use function PHPUnit\Framework\returnValue;

class AdminDeskmap extends Component
{
    public $floor = "1";
    public $selectedDesk ='-';
    public $bookedDesk = '-';
    public $deskDisabled;

    public $selectedDeskID;

    public $bookedDeskIDs = [];
    public $userBooking = [];
    // public $canBook;

    public $max;
    public $min;
    
    public $showConfirmation = false;
    public $showNotification = false;
    public $showEnableModal = false;
    public $showEnabledNotification = false;

    public $showWarning = false;
    public $showWarning2 = false;
    



    public function refreshMap() 
    {
        $floor = $this->floor;
        $user = Auth::user()->id;
        $desks = Desk::all(); 
        // $canBook = $this->canBook;
        

        /** Reset selectedDesk if DATE/FLOOR is CHANGED or if DATE is CLEARED (i.e. user cleared the date.) */
        $this->selectedDesk = '-';
        // $this->bookedDesk ='-';

        /**
         * Check IF there is a date and floor selected
         * ELSE, return NOTHING
         */
        if($this->floor){

        
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




            // 2nd array
            $bookedDeskIDs = [];
            // $canBook = true;

            // Access each row of $bookings.
            // for ($booking = 0; $booking <= count($bookings) - 1 ; $booking++){

            //     // Access its user_id
            //     $bookingUserID = $bookings[$booking]['user_id'];
            //     $bookingDate = $bookings[$booking]['booking_date'];

            //     if ($date == $bookingDate){
  
            //         if($floor == 1){
            //             if ($bookings[$booking]['desk_id'] <= 36){
            //                 array_push($bookedDeskIDs, $bookings[$booking]['desk_id']);
            //             }
            //         }
            //         elseif($floor == 2){
            //             if ($bookings[$booking]['desk_id'] >= 37){
            //                 array_push($bookedDeskIDs, $bookings[$booking]['desk_id']);
            //             }
            //         }

            //         if ($user != $bookingUserID){
            //             $canBook = true;
            //         }
            //         elseif ($user == $bookingUserID){
            //             // dd($bookings[$booking]['desk_id'] - 1);
            //             $deskNum = $bookings[$booking]['desk_id'] - 1;
            //             // dd($deskNum);
            //             array_push($this->userBooking, [
            //                 'user_id' => $bookings[$booking]['user_id'],
            //                 'desk_num' => $desks[$deskNum]['desk_num'],
            //                 'booking_date' => $bookings[$booking]['booking_date'],
            //             ]);
            //             $canBook = false;
            //             break;
            //         }
                    
            //     }
            // };

            $this->bookedDeskIDs = $bookedDeskIDs;

            
            // $this->canBook = $canBook;
            
        }  
    }

    public function clickDesk($key)
    {
        $desks = Desk::all();

        /** Can't click if there's NO FLOOR */
        if($this->floor){
            
            /** Check if the Desk Selected is 'in_use' */ 
            if($desks[$key]->status == 'in_use')
            {
                /** Assign the $selectedDesk as the Desk Selected */ 
                $this->selectedDesk = $desks[$key]->desk_num;
                $this->selectedDeskID = $desks[$key]->id;
                $this->deskDisabled = false;
            }

            // Desk already DISABLED
            else
            {
                $this->deskDisabled = true;
                // $this->showDisabledModal = true;
                $this->selectedDeskID = $desks[$key]->id;
                $this->selectedDesk = $desks[$key]->desk_num;

                // dd('it\'s already disabled !!! ');
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

    public function setDeskAvailabilityConfirmation()
    {
        $floor = $this->floor;
        $selectedDesk = $this->selectedDesk; 
        $deskDisabled = $this->deskDisabled;

        if (!$deskDisabled && ($floor && ($selectedDesk != '-')))
        {
            $this->showConfirmation = true;
        }

        elseif ($deskDisabled)
        {
            $this->showEnableModal = true;
        }


        // dd($this->showConfirmation);
    }

    public function closeModal()
    {
        $this->showConfirmation = false;  
        $this->showNotification = false;  
        $this->showEnableModal = false;  
        $this->showEnabledNotification = false;
    }

    public function goHome()
    {
        $this->showNotification = false;

        $this->redirect('/');
    }

    public function setDeskAvailability()
    {
        $floor = $this->floor;
        $selectedDesk = $this->selectedDesk;
        $selectedDeskID = $this->selectedDeskID;
        $deskDisabled = $this->deskDisabled;
        
        
        if (!$deskDisabled && ($floor && ($selectedDesk != '-'))){

            // dd($selectedDeskID, 'tara disable');
            
            Desk::where('id', $selectedDeskID)->update(['status' => 'not_available',]);
            Bookings::where('desk_id', $selectedDeskID)->update([
                'status' => 'canceled',
            ]);
            
            $this->selectedDesk = '-';
            
            $this->showConfirmation = false;
            $this->showNotification = true;
            AdminDeskmap::refreshMap();
        }

        // elseif ($deskDisabled && ($floor && ($selectedDesk != '-'))){
        elseif ($deskDisabled) {

            // dd($selectedDeskID, 'tara enable');

            Desk::where('id', $selectedDeskID)->update(['status' => 'in_use',]);
            Bookings::where('desk_id', $selectedDeskID)->update([
                'status' => 'accepted',
            ]);

            $this->selectedDesk = '-';
            $this->showEnableModal = false;
            $this->showEnabledNotification = true;
            AdminDeskmap::refreshMap();
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
        $desks = Desk::all();

        $this->max = Carbon::today()->addDays(14)->toDateString();
        $max = $this->max;

        $this->min= Carbon::today()->toDateString();
        $min = $this->min;



        return view('livewire.admin-deskmap', compact('desks', 'max', 'min'));
    }
}
