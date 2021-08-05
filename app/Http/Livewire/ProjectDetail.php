<?php

namespace App\Http\Livewire;

use App\Project;
use App\Project_invoice;
use Livewire\Component;

class ProjectDetail extends Component
{
    public $project;

    public function mount($id){
        $this->project = Project::find($id);
    }


    public function createInvoice($id){

        $num = str_pad(mt_rand(0,10000),5,0,STR_PAD_LEFT);
        $date = date("ymd");
        $order_id = 'GCO-'.$date.'-'.$num.'-'.$id;

        $date = date("Y");
        $id = Project_invoice::select('no_invoice')->latest('id')->first();
        if(!$id == null){
            $id = substr($id->no_invoice, 0,1)+1;
            $invoice_no = $id.'/GC/V/'.$date;
        }else{
            $invoice_no = '1/GC/V/'.$date;
        }

        Project_invoice::create([
            'no_invoice' => $invoice_no,
            'order_id' => $order_id,
            'total_pay' => $this->project->estimate_budget,
            'project_id' => $this->project->id,
            'status' => 0,
            'payment_method' => 'By System'
        ]);
    }

    public function render()
    {

        return view('livewire.project-detail')
            ->extends('templates.dashboard')
            ->section('content');
    }
}
