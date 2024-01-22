<?php

namespace App\Livewire;

use Livewire\Component;

class AdminBooking extends Component
{
      
    public $data = [];
    public $showModal = false;
    public $currentIndex;
    
    public function mount()
    {
        // Example data
        $this->data = [
            [   'Id' => 'EQY0187',
                'Name' => 'Denise Chavez',
                'Date' => 'November 1, 2023',
                'Floor ID' => 1,
                'Desk ID' => 103,
                'Action' => '<a style="cursor: pointer; display: flex; justify-content: center; "><img src="' . asset("images/delete.svg") . '" class="h-4 w-4"></a>',

            ],
            [   'Id' => 'EQY0678',
                'Name' => 'Rieza Espejo',
                'Date' => 'November 2, 2023',
                'Floor ID' => 1,
                'Desk ID' => 104,
                'Action' => '<a style="cursor: pointer; display: flex; justify-content: center; "><img src="' . asset("images/delete.svg") . '" class="h-4 w-4"></a>',

            ],
        ];
       
    }

    public function openModal($index)
    {
        $this->currentIndex = $index;  // Store the index when modal is opened
        $this->showModal = true;
    }

    public function handleAction()
    {
        // Use $this->currentIndex to perform the action on the specific data item
        $index = $this->currentIndex;

        if (isset($this->data[$index]) && $this->data[$index]['Action'] !== 'canceled') {
            $this->data[$index]['Action'] = 'canceled';
        }

        $this->closeModal();  // Close the modal after handling the action
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.admin-booking');
    }
}
