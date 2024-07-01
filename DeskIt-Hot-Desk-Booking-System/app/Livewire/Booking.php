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
    // use HandlesEvents;
    public $date;
    public $time;
    public $floor = "1";
    public $selectedDesk ='-';
    public $bookedDesk = '-';

    public $selectedDeskID;

    public $bookedDeskIDs = [];
    public $userBooking = [];

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
        $time = $this->time;

        $desks = Desk::all(); 

        /** Reset selectedDesk if DATE/FLOOR is CHANGED or if DATE is CLEARED (i.e. user cleared the date.) */
        $this->selectedDesk = '-';
        $this->bookedDesk ='-';

        if($date && $floor && $time)
        {
            $this->bookedDeskIDs = Bookings::where('booking_date', $date)->whereIn('status', ['accepted', 'pending'])->pluck('desk_id')->toArray();
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
        $time = $this->time;

        $desks = Desk::all(); 
        $user = Auth::user()->id;

        $this->userBooking = Bookings::where('booking_date', $date)->where('user_id', $user)->where('status', 'accepted')->get()->toArray();

        if (($date && $floor && ($selectedDesk != '-') && $time))
        {
            if($this->userBooking){

                $this->dispatch('open-modal', name: 'warning-booking-modal');
            }
            elseif(empty($this->userBooking)){
                $this->dispatch('open-modal', name: 'confirm-booking-modal');
            }
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