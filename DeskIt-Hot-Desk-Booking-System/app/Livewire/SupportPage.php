<?php

namespace App\Livewire;

use Livewire\Component;

class SupportPage extends Component
{   
    public $sectionNumber;
    public $showDescriptions = [];

    public function toggleDescription($section)
    {
        // Toggle the state for the specific section
        $this->showDescriptions[$section] = !$this->showDescriptions[$section];
    }
    public function mount()
    {
        $this->showDescriptions = [1 => false, 2 => false, 3 => false, 4 => false, 5 => false, 6 => false, 7 => false, 8 => false, 9 => false, 10 => false, 11 => false, 12 => false, 13 => false,];
    }


        public function render()
    {
        return view('livewire.support-page');
    }
}
