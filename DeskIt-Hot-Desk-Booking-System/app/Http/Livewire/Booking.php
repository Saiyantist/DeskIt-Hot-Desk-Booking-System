<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Booking extends Component
{
    
    public $dateSelected = false;
    public $floorSelected = false;
    public $showNextButton = false;


    public function selectedDate()
    {
        $this->dateSelected = true;
        $this->showNextButton = true;
    }

    public function selectedFloor()
    {
        $this->floorSelected = true;
        $this->showNextButton = true;
    }
    

    public function navigateToDesk()
    {
        // Perform any necessary actions before navigation

        $this->redirect('desks');
    }



    public function render()
    {
        return view('livewire.booking');

    }
}
