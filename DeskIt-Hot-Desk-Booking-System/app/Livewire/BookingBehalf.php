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

use function PHPUnit\Framework\returnValue;

class BookingBehalf extends Component
{
    public $availableDeskCount;

    public $bookedCount;
    public $notAvailableCount;
    public $selectedUserID;
    public $user;
    public $userName;

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
    

    public function mount() {
        $this->availableDeskCount = Desk::where('status', 'in_use')->count();
        $this->notAvailableCount = Desk::where('status', 'not_available')->count();
        $this->bookedCount = Bookings::where('status', 'accepted')->count();
    }

    public function refreshMap() 
    {
        $date = $this->date;
        $floor = $this->floor;
        $time = $this->time;

        $this->user = User::find($this->selectedUserID);

        $desks = Desk::all(); 

        /** Reset selectedDesk if DATE/FLOOR is CHANGED or if DATE is CLEARED (i.e. user cleared the date.) */
        $this->selectedDesk = '-';
        $this->bookedDesk ='-';

        if($date && $floor && $time && $this->user)
        {
            $this->bookedDeskIDs = Bookings::where('booking_date', $date)->whereIn('status', ['accepted', 'pending'])->pluck('desk_id')->toArray();
        }
    }

    public function clickDesk($key)
    {
        $desks = Desk::all();
        
        /** 
         *   Get the selected "booked" desk's Booker name
         */
        $booking = Bookings::where('booking_date', $this->date)->whereIn('status', ['accepted', 'pending'])->where('desk_id', $desks[$key]->id)->first();
        if(!is_null($booking)){
            if($desks[$key]->id == $booking->desk_id){
                $userName = User::where('id', $booking->user_id)->pluck('name')->first();
            }
        }
        
        /** Can't click if there's NO DATE && FLOOR */
        if($this->date && $this->floor && $this->time && $this->selectedUserID){
            
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
                    $this->userName = $userName;
                    $this->bookedDesk = $desks[$key]->desk_num;
                    $this->dispatch('open-modal', name: 'warning-2-booking-modal');
                }
            }
        }
    }

    public function validateBooking()
    {
        $date = $this->date;
        $floor = $this->floor;
        $selectedDesk = $this->selectedDesk; 
        $user = $this->selectedUserID;
        $time = $this->time;

        $this->userBooking = Bookings::where('booking_date', $date)->whereIn('status', ['pending', 'accepted'])->where('user_id', $user)->get()->toArray();

        // dd($this->userBooking[0]->desk_id);

        if (($date && $floor && ($selectedDesk != '-') && $time && $user && empty($this->userBooking)))
        {
            $this->dispatch('open-modal', name: 'confirm-booking-modal');
        }
        elseif (!($date && $floor && ($selectedDesk != '-') && $time && $user && empty($this->userBooking)))
        {
            $this->dispatch('open-modal', name: 'warning-booking-modal');
        } 
        elseif (false && ($date && $floor && ($selectedDesk != '-') && $time && $user))
        {
            $this->showWarning3 = true;
        }
    }

    public function closeModal()
    {
        $this->showConfirmation = false;  
        $this->showNotification = false;  
        $this->showWarning = false;
        $this->showWarning2 = false;
        $this->showWarning3 = false;
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
        $time = $this->time;
        $user = $this->selectedUserID;

        if ($date && $floor && ($selectedDesk != '-')) {

            Bookings::create([
                "booking_date" => $date,
                "booking_time" => $time,
                "status" => 'accepted',
                "user_id" => $user,
                "desk_id" => $selectedDeskID,
            ]);

            $this->selectedDesk = '-';
            $this->bookedDesk = '-';
            $this->refreshMap(); 
        }

        if(Config::get('bookings.auto_accept')){
            session()->flash('autoAccept', 'Desk Booked Successfully!');
        }
        else{
            session()->flash('pending', 'Desk Booking is placed!');
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

    public function resetEditData()
    {
        
    }

    public function render()
    {
        $usersWithRoles = User::role('employee')->get();

        $desks = Desk::all();

        $this->max = Carbon::today()->addDays(14)->toDateString();
        $max = $this->max;

        $this->min= Carbon::today()->toDateString();
        $min = $this->min;

        return view('livewire.booking-behalf', compact('desks', 'max', 'min', 'usersWithRoles'));
    }
}
