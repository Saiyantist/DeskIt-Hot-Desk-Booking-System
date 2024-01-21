<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\Auth;
use App\Http\Controllers\BookingController;
use Carbon\Carbon;
use App\Models\Desk;

use function PHPUnit\Framework\returnValue;

class Booking extends Component
{

    public $date;
    public $floor= "1";
    // public $today;

    public $selected = false;

    public $max;
    public $min;
    
    // public $rules = [
    //     'date' => 'required',
    //     'floor' => 'required',
    // ];

    // public function selectedDate()
    // {
    //     $this->dateSelected = true;
    // }

    // public function selectedFloor()
    // {
    //     $this->floorSelected = true;
    // }
    


    
    /**DESK AVAILABILITY */
    public function refreshMap() 
    {
        if($this->date && $this->floor){
            $this->selected = true;

            $selected = $this->selected;
            // $selected = false;
            $date = $this->date;
            $floor = $this->floor;

            
            /**  
             *  INSERT LOGIC to show DeskMap's availability. 
             */




            dd($this->date,$this->floor, $this->selected, $this->max);           // for testing purpose

            return view('livewire.booking', compact('selected',));
        }
        
        // dd('Ayaw ko nga.');

        // return view('booking.desks');
    }

    public function book()
    {
        /**  
         *  INSERT Validation Logic, if desk is available for booking. 
         */

        $status = "booked";

        Booking::create([
            "booking_date" => $this->date,    /** This whole block doesn't work yet.. */
            "status" => $status,            
            "user_id" => Auth::user(),
            // "desk_id" => 101,
        ]);

        dd($status); 
    }



    // public function navigateToDesk()
    // { 
    //     if( $this->dateSelected && $this->floorSelected){
    //         // Perform any necessary actions before navigation
    //         $this->redirect('desks');
    //     }
    // }



    public function render()
    {
        $desks = Desk::all();

        $this->max = Carbon::today()->addDays(14)->toDateString();
        $max = $this->max;

        $this->min= Carbon::today()->toDateString();
        $min = $this->min;

        return view('livewire.booking', compact('desks', 'max', 'min'));
    }
}
