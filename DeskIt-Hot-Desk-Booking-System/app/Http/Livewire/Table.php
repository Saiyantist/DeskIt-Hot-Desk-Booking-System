<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Table extends Component
{
    
    public $data = [];
    public $showModal = false;
    public $index;
    
    public function mount()
    {
        // Example data
        $this->data = [
            [
                'date' => 'November 1, 2023',
                'Floor ID' => 1,
                'Desk ID' => 103,
                'Status' => 'confirmed',
                'Action' => '<a wire:click="openModal" style="cursor: pointer; display: flex; justify-content: center; "><img src="' . asset("images/delete.svg") . '" class="h-4 w-4"></a>',

            ],
            [
                'date' => 'November 1, 2023',
                'Floor ID' => 1,
                'Desk ID' => 104,
                'Status' => 'confirmed',
                'Action' => '<a wire:click="openModal" style="cursor: pointer; display: flex; justify-content: center; "><img src="' . asset("images/delete.svg") . '" class="h-4 w-4"></a>',

            ],
        ];
       
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function handleAction($index)
    {
        $this->data[$index]['Status'] = 'canceled';
    }

    public function render()
    {
        return view('livewire.table');
    }
}
