<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddLedgers extends Component
{

    public $ledgers_type;
    public $project = 'project';
    public $supply = 'supply';

    // public function updatedLedgersType($ledgers_type, $project, $supply){

    // }

    public function render()
    {
        return view('livewire.add-ledgers');
    }
}
