<?php

namespace App\Http\Livewire;

use App\Project;
use Livewire\Component;

class ProjectDetail extends Component
{
    public $project;

    public function mount($id){
        $this->project = Project::find($id);
    }
    public function render()
    {

        return view('livewire.project-detail')
            ->extends('templates.dashboard')
            ->section('content');
    }
}
