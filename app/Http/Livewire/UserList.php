<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.user-list', [
            'users' => User::with(['employees'])->paginate(10)
        ]);
    }
}
