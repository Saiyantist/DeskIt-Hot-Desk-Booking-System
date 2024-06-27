<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use App\Models\Desk;
use App\Models\Bookings;
use App\Models\User;
use Illuminate\Validation\Rules\Can;
use Livewire\Features\SupportEvents\HandlesEvents;

use function PHPUnit\Framework\returnValue;

class Booking extends Component
{
    use HandlesEvents;
    public $date;
    public $time;
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
    public $showWarning3 = false;
    
    public $tutorialCompleted = false;

    public $selectedDeskIndex = null;
    public function refreshMap() 
    {
        $date = $this->date;
        $floor = $this->floor;
        $user = Auth::user()->id;
        $desks = Desk::all(); 
        $canBook = $this->canBook;
        $time = $this->time;

        /** Reset selectedDesk if DATE/FLOOR is CHANGED or if DATE is CLEARED (i.e. user cleared the date.) */
        $this->selectedDesk = '-';
        $this->bookedDesk ='-';

        /**
         * Check IF there is a date and floor selected
         * ELSE, return NOTHING
         */
        if($this->date && $this->floor && $this->time){

        
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
                    'booking_date' => $booking->booking_date,
                    'booking_time' => $booking->booking_time,
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

        /** Can't click if there's NO DATE && FLOOR && TIME */
        if($this->date && $this->floor && $this->time){
            
            /** Check if the Desk Selected is 'in_use' */ 
            if($desks[$key]->status == 'in_use')
            {
                /** Check if it is NOT BOOKED */
                if(!in_array($desks[$key]->id, $this->bookedDeskIDs))
                {
                    /** Then finally, assign the $selectedDesk as the Desk Selected */ 
                    $this->selectedDesk = $desks[$key]->desk_num;
                    $this->selectedDeskID = $desks[$key]->id;
                    $this->selectedDeskIndex = $key;
                }
    
                elseif(in_array($desks[$key]->id, $this->bookedDeskIDs))
                {
                    $this->bookedDesk = $desks[$key]->desk_num;
                    $this->dispatch('open-modal', name: 'warning-2-booking-modal');
                    // $this->showWarning2 = true;
                }
            }
    
            else
            {
                // dd('it\'s like broken eh..');
            }
        }
    }

    public function validateBooking()
    {
        $date = $this->date;
        $floor = $this->floor;
        $selectedDesk = $this->selectedDesk; 
        $canBook = $this->canBook;
        $time = $this->time;

        if ($canBook && ($date && $floor && ($selectedDesk != '-') && $time))
        {
            $this->dispatch('open-modal', name: 'confirm-booking-modal');
        }
        elseif ($canBook === false && ($date && $floor && ($selectedDesk != '-') && $time))
        {
            $this->dispatch('open-modal', name: 'warning-booking-modal');
        }
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
        $this->redirect('/');
    }

    public function book()
    {
        $date = $this->date;
        $time = $this->time;
        $floor = $this->floor;
        $selectedDesk = $this->selectedDesk;
        $selectedDeskID = $this->selectedDeskID;

        $user = Auth::user()->id;

        if ($date && $floor && ($selectedDesk != '-') && $time){

            Bookings::create([
                "booking_date" => $date,
                "booking_time" => $time,
                "status" => 'accepted',
                "user_id" => $user,
                "desk_id" => $selectedDeskID,
            ]);
            $this->selectedDesk = '-';
            $this->bookedDesk = '-';
            // $this->showNotification = true;
            Booking::refreshMap();
        }

        if(Config::get('bookings.auto_accept')){
            session()->flash('autoAccept', 'Desk Booked Successfully!');
        }
        else{
            session()->flash('pending', 'Desk Booking is placed!');
        }
    }

    public function resetEditData()
    {
        
    }
    public function mount()
    {
        $user = Auth::user();
        $this->tutorialCompleted = $user->tutorial_completed;
    }

    protected $listeners = ['completeTutorial'];
    public function completeTutorial()
    {
        $user = Auth::user();
        $user->tutorial_completed = true;
        $user->save();

        $this->tutorialCompleted = true;
    }
    

    public function render()
    {
        $desks = Desk::all();

        $this->max = Carbon::today()->addDays(14)->toDateString();
        $max = $this->max;

        $this->min= Carbon::today()->toDateString();
        $min = $this->min;

        return view('livewire.booking', [
            'desks' => $desks,
            'max' => $this->max,
            'min' => $this->min,
            'tutorialCompleted' => $this->tutorialCompleted,
        ]);
    }
}