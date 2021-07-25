<?php

namespace App\Http\Livewire;

use App\Project;
use App\Project_employee;
use App\Project_invoice;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'deleteProject',
        'refreshProp',
    ];

    public $paginateData = 10;
    public $editMode, $detailMode = false;

    public $searchProject, $filterStatus, $project_id, $project_name, $project_description, $project_status, $project_leader_id, $client_name, $client_contact, $estimate_budget, $pay_status;

    public Project $project;

    public function editProject($id){
        $data = Project::findOrFail($id);

        $this->project_id = $id;
        $this->project_name = $data->project_name;
        $this->project_description = $data->project_description;
        $this->project_status = $data->project_status;
        $this->project_leader_id = $data->project_leader_id;
        $this->client_name = $data->client_name;
        $this->client_contact = $data->client_contact;
        $this->estimate_budget = $data->estimate_budget;
        $this->pay_status = $data->pay_status;

        $this->editMode = true;
        $this->dispatchBrowserEvent('editData');

    }

    public function updateProject(){
        if($this->project_id){

            $updateProject = Project::where('id', '=', $this->project_id)
                            ->update([
                                'project_leader_id' => $this->project_leader_id,
                                'pay_status' => $this->pay_status,
                                'project_status' => $this->project_status,
                                'project_description' => $this->project_description,
                            ]);

            $this->editMode = false;

            $this->dispatchBrowserEvent('swal',
            ['icon' => 'success',
            'title' => 'Berhasil',
            'html' =>  'Berhasil update data proyek : <b>'.$this->project_name.'</b>',
            'showConfirmButton' => false,
            'timer' => 1500
            ]
        );
        $this->reset();

        }
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function deleteWindow($id){
        $data = Project::findOrFail($id);
        $this->dispatchBrowserEvent('swal:confirm',
            [
                'id' => $id,
                'icon' => 'warning',
                'title' => 'Menghapus Data',
                'html' => 'Yakin ingin menghapus data <b>'.$data->project_name.'</b> ?',
                'showCancelButton' => true,
                'confirmButtonText' => 'Hapus',
                'cancelButtonText' => 'Batal',
            ]
        );
    }

    public function deleteProject($id){
        if($id){
            $invoices = Project_invoice::where('project_id', $id)->get();
            if($invoices){
                $invoice_delete = Project_invoice::where('project_id', $id)->delete();
                $deleted = Project::where('id', $id)->delete();
                if($deleted && $invoice_delete){
                    $this->dispatchBrowserEvent('swal',
                        [
                            'icon' => 'success',
                            'title' => 'Berhasil',
                            'text' =>  'Berhasil hapus data ',
                            'showConfirmButton' => false,
                            'timer' => 1500
                        ]
                    );
                }
            }else{
                $deleted = Project::where('id', $id)->delete();
                if($deleted){
                    $this->dispatchBrowserEvent('swal',
                        [
                            'icon' => 'success',
                            'title' => 'Berhasil',
                            'text' =>  'Berhasil hapus data ',
                            'showConfirmButton' => false,
                            'timer' => 1500
                        ]
                    );
                }
            }
        }
    }

    public function detailProject($id){
        $this->detailMode = true;
        $this->project = Project::findOrFail($id);
        $this->emit('refreshProp');
    }

    public function refreshProp(){
        if(!$this->detailMode){
            $this->dispatchBrowserEvent('refreshProp');
        }else{
            $this->dispatchBrowserEvent('refreshProp');
        }
    }


    public function render()
    {
        $this->emit('refreshProp');
        $s = '%'.$this->searchProject.'%';
        if($this->filterStatus == null){
            $projects = Project::with(['users.employees'])
            ->paginate($this->paginateData);
        }else{
            $projects = Project::where('project_name', 'like', $s)
            ->where('project_status', '=', $this->filterStatus)
            ->with('users.employees')
            ->paginate($this->paginateData);
        }

        $project_leader = User::where('id', '!=', 1)->where('account_status', '>', '0')->with('employees')->get();
        return view('livewire.project-list', compact('projects', 'project_leader'));
    }
}
