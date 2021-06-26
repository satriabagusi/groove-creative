<?php

namespace App\Http\Livewire;

use App\Project;
use App\User;
use Livewire\Component;

class AddProject extends Component
{

    public Project $project;

    protected $rules = [
        'project.project_name' => 'required',
        'project.client_name' => 'required',
        'project.client_contact' => 'numeric',
        'project.project_status' => 'required',
        'project.pay_status' => 'required',
        'project.project_description' => 'required',
        'project.project_leader_id' => 'required'
    ];

    public function updated($project){
        $this->validateOnly($project);
    }

    public function render()
    {
        $project_leader = User::where('id', '!=', 1)->get();
        return view('livewire.add-project', compact('project_leader'));
    }
}
