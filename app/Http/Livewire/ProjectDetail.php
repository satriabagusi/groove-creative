<?php

namespace App\Http\Livewire;

use App\Ledger;
use App\Project;
use App\Project_invoice;
use App\Project_ledger;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectDetail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $project, $total_ledger, $project_ledger, $project_id;

    public function mount($id){
        $this->project = Project::find($id);
        $this->project_id = $id;
        $this->total_ledger = $this->project->ledger->sum('ammount');
        return $this->total_ledger;
    }

    public function render()
    {

        return view('livewire.project-detail', [
                'project_ledger' => Project_ledger::where('project_id', $this->project_id)->paginate(5),
            ])
            ->extends('templates.dashboard')
            ->section('content');
    }
}
