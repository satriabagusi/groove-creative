<?php

namespace App\Http\Livewire;

use App\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectList extends Component
{
    use WithPagination;

    public $searchProject;

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $s = '%'.$this->searchProject.'%';
        return view('livewire.project-list', [
            'projects' => Project::where('project_name', 'like', $s)->paginate(10)
        ]);
    }
}
