<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\Auth;

use function PHPUnit\Framework\returnValue;

class Booking extends Component
{

    public $date;
    public $floor= "1";

    public $selected = false;
    
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

            /**  
             *  INSERT LOGIC to show DeskMap's availability. 
             */

            dd($this->date,$this->floor, $selected);           // for testing purpose

            return $selected; // return something
        }

        
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
        // $hasSelected = $this->selected;
        return view('livewire.booking',[
            // 'selected' => $hasSelected    // test para gumana 'yung @if() that contains modal code, but ayaw talaga. 
        ]);

    }
}
