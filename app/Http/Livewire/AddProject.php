<?php

namespace App\Http\Livewire;

use App\Project;
use App\Project_invoice;
use App\User;
use Livewire\Component;

class AddProject extends Component
{

    public $project_name, $project_description, $project_status, $project_leader_id, $client_name, $client_contact, $estimate_budget, $pay_status;
    public $total_pay = 0;

    protected $rules = [
        'project_name' => 'required',
        'project_description' => 'required',
        'project_status' => 'required|numeric|max:3|min:0',
        'project_leader_id' => 'required|numeric',
        'client_name' => 'required',
        'client_contact' => 'required',
        'estimate_budget' => 'required|numeric',
        'pay_status' => 'required|numeric|max:2',
        'total_pay' => 'numeric|exclude_unless:pay_status,1|lte:estimate_budget|min:1',
    ];

    protected $messages = [
        'project_name.required' => 'Nama Proyek kosong.',
        'project_description.required' => 'Deskripsi proyek kosong.',
        'project_status.required' => 'Status Proyek tidak terpilih.',
        'project_status.numeric' => 'Status Proyek tidak valid.',
        'project_status.max' => 'Status Proyek tidak valid.',
        'project_status.min' => 'Status Proyek tidak valid.',
        'project_leader_id.required' => 'Pemimpin Proyek kosong.',
        'project_leader_id.numeric' => 'Pemimpin Proyek tidak valid.',
        'client_name.required' => 'Nama Klien kosong.',
        'client_contact.required' => 'Kontak Klien kosong.',
        'estimate_budget.required' => 'Estimasi Anggaran kosong.',
        'estimate_budget.numeric' => 'Format Estimasi Anggaran tidak sesuai.',
        'pay_status.required' => 'Status pembayaran Kosong.',
        'pay_status.numeric' => 'Format Status Pembayaran tidak sesuai.',
        'pay_status.max' => 'Format Status Pembayaran tidak sesuai.',
        'total_pay.numeric' => 'Format Total Pembayaran tidak sesuai.',
        'total_pay.lte' => 'Total Pembayaran melebihi estimasi Anggaran Proyek',
        'total_pay.min' => 'Total pembayaran adalah 0'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function saveProjectData(){
        $validatedData = $this->validate();

        if($this->pay_status == 0){
            Project::create([
                'project_name' => $this->project_name,
                'client_name' => $this->client_name,
                'client_contact' => $this->client_contact,
                'estimate_budget' => $this->estimate_budget,
                'project_status' => $this->project_status,
                'pay_status' => $this->pay_status,
                'project_description' => $this->project_description,
                'project_leader_id' => $this->project_leader_id,
            ]);
        }else if($this->pay_status == 1){
            $project = Project::create([
                'project_name' => $this->project_name,
                'client_name' => $this->client_name,
                'client_contact' => $this->client_contact,
                'estimate_budget' => $this->estimate_budget,
                'project_status' => $this->project_status,
                'pay_status' => $this->pay_status,
                'project_description' => $this->project_description,
                'project_leader_id' => $this->project_leader_id,
            ]);

            Project_invoice::create([
                'total_pay' => $this->total_pay,
                'project_id' => $project->id,
            ]);
        }else if($this->pay_status == 2){
            $project = Project::create([
                'project_name' => $this->project_name,
                'client_name' => $this->client_name,
                'client_contact' => $this->client_contact,
                'estimate_budget' => $this->estimate_budget,
                'project_status' => $this->project_status,
                'pay_status' => $this->pay_status,
                'project_description' => $this->project_description,
                'project_leader_id' => $this->project_leader_id,
            ]);

            Project_invoice::create([
                'total_pay' => $this->estimate_budget,
                'project_id' => $project->id,
            ]);
        }

        session()->flash('success', 'Proyek '.$this->project_name.' berhasil di Input.');
        return redirect()->to('/dashboard/project');

    }


    public function render()
    {
        $project_leader = User::where('id', '!=', 1)->where('account_status', '>', '0')->get();
        return view('livewire.add-project', compact('project_leader'));
    }
}
