<?php

namespace App\Livewire;

use Livewire\Component;

class Table extends Component
{
    
    public $data = [];
    public $showModal = false;
    public $currentIndex;
    
    public function mount()
    {
        // Example data
        $this->data = [
            [
                'date' => 'November 1, 2023',
                'Floor ID' => 1,
                'Desk ID' => 103,
                'Status' => 'confirmed',
                'Action' => '<a style="cursor: pointer; display: flex; justify-content: center; "><img src="' . asset("images/delete.svg") . '" class="h-4 w-4"></a>',

            ],
            [
                'date' => 'November 1, 2023',
                'Floor ID' => 1,
                'Desk ID' => 104,
                'Status' => 'confirmed',
                'Action' => '<a style="cursor: pointer; display: flex; justify-content: center; "><img src="' . asset("images/delete.svg") . '" class="h-4 w-4"></a>',

            ],
        ];
       
    }

    public function openModal($index)
    {
        $this->currentIndex = $index;  
        $this->showModal = true;
    }

   
    public function handleAction()
    {
        $index = $this->currentIndex;

        if (isset($this->data[$index]) && $this->data[$index]['Status'] !== 'canceled') {
            $this->data[$index]['Status'] = 'canceled';
        }

        $this->closeModal();  // Close the modal after handling the action
    }
    public function closeModal()
    {
        $this->showModal = false;
    }


    public function render()
    {
        return view('livewire.table');
    }
}
