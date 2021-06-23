<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;

class AddProject extends Component
{
    public function render()
    {
        return view('livewire.add-project', [
            'users' => User::get()
        ]);
    }
}
