<?php

namespace App\Http\Livewire;

use App\Project;
use App\Project_invoice;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProjectInvoice extends Component
{
    use WithFileUploads;

    public $project, $invoice_type, $project_id, $project_selected, $checkInvoice, $bukti_pembayaran, $pay_status, $invoice_no, $order_id, $estimate_budget;
    public $total_pay = 0;



    protected $rules = [
        'invoice_type' => 'required',
        'total_pay' => 'required|numeric|not_in:0|lt:estimate_budget',
    ];

    protected $messages = [
        'invoice_type.required' => 'Jenis Invoice belum dipilih.',
        'total_pay.required' => 'Jumlah Pembayaran Kosong.',
        'total_pay.numeric' => 'Format Jumlah Pembayaran tidak sesuai.',
        'total_pay.not_in' => 'Jumlah Pembayaran tidak sesuai',
        'total_pay.lt' => 'Jumlah DP melebihi Total Anggaran',
    ];


    // function updatedPaymentType($payment_type){
    //     $this->dispatchBrowserEvent('selectpicker');
    //     if($payment_type == 1){
    //         $this->total_pay = 0;
    //     }
    // }

    function updatedProjectId($project_id){
        $this->dispatchBrowserEvent('selectpicker');
        $this->project_selected = Project::findOrFail($project_id);

        $num = str_pad(mt_rand(0,10000),5,0,STR_PAD_LEFT);
        $date = date("ymd");
        $this->order_id = 'GCO-'.$date.'-'.$num.'-'.$project_id;
        $this->checkInvoice = Project_invoice::where('project_id', $project_id)->latest('created_at')->first();

        $this->estimate_budget = $this->project_selected->estimate_budget;
    }

    function updatedInvoiceType($invoice_type){
        $this->estimate_budget = $this->project_selected->estimate_budget;
        $lastPay = $this->checkInvoice->total_pay;
        if ($invoice_type == 1) {
            if($this->checkInvoice){
                $this->total_pay = $this->estimate_budget - $lastPay;
            }else{
                $this->total_pay = $this->project_selected->estimate_budget;
            }
        }elseif($invoice_type == 0){

            $this->total_pay = 0;

        }

    }

    public function updatedTotalPay($total_pay){
        $this->validateOnly('total_pay');

        //     $this->project_selected = Project::findOrFail($this->project_id);
        //     $estimate_budget = $this->project_selected->estimate_budget;
        //     $this->checkInvoice = Project_invoice::where('project_id', $this->project_id)->latest('created_at')->first();


        //     if($this->checkInvoice !== null){
        //         if ($this->invoice_type == 0 && $this->payment_type == 0) {
        //             $this->total_pay = (20/100) * $estimate_budget;
        //         }elseif($this->invoice_type == 1){
        //             if ($this->checkInvoice->invoice_type == 0) {
        //                 $this->total_pay = $estimate_budget - $this->checkInvoice->total_pay;
        //             }else{
        //                 $this->total_pay = $estimate_budget;
        //             }
        //         }
        //     }elseif($this->checkInvoice == null && $this->payment_type == 0){
        //         if($this->invoice_type == 0){
        //             $this->total_pay = (20/100) * $estimate_budget;
        //         }elseif($this->invoice_type == 1){
        //             $this->total_pay = $estimate_budget;
        //         }
        //     }

    }


    public function mount(){
        $this->project = Project::withCount(['project_invoices'])->having('project_invoices_count', '<', 2)->where('pay_status', '<', 2)->get();
        $date = date("Y");
        $id = Project_invoice::select('no_invoice')->latest('id')->first();
        if(!$id == null){
            $id = substr($id->no_invoice, 0,1)+1;
            $this->invoice_no = $id.'/GC/V/'.$date;
        }else{
            $this->invoice_no = '1/GC/V/'.$date;
        }
    }



    public function createInvoice(){

        $this->validate();

        Project_invoice::create([
            'no_invoice' => $this->invoice_no,
            'order_id' => $this->order_id,
            'total_pay' => $this->total_pay,
            'project_id' => $this->project_selected->id,
            'invoice_type' => $this->invoice_type,
            'status' => 0,
            'payment_method' => "Manual",
        ]);

        $this->dispatchBrowserEvent('swal',
        [
            'icon' => 'success',
            'title' => 'Berhasil',
            'html' => 'Invoice berhasil dibuat',
            'confirmButtonColor' => '#2782F7',
            'id' => $this->project_selected->id,
        ]);




        // return redirect()->to('/dashboard/project/detail/'.$this->project_selected->id);
        // if($this->invoice_type == 0){
        //     Project_invoice::create([
        //         'no_invoice' => $invoice_no,
        //         'order_id' => $order_id,
        //         'total_pay' => $this->total_pay,
        //         'project_id' => $this->project->id,
        //         'invoice_type' => $this->invoice_type,
        //         'status' => 0,
        //         'payment_method' => $status,
        //     ]);
        //     $this->dispatchBrowserEvent('swal',
        //         ['icon' => 'success',
        //         'title' => 'Berhasil',
        //         'html' =>  'Berhasil membuat Invoice untuk proyek : <b>'.$this->project->project_name.'</b>',
        //         'showConfirmButton' => false,
        //         'timer' => 1500
        //         ]
        //     );

        // }elseif($this->invoice_type == 1) {
        //     Project_invoice::create([
        //         'no_invoice' => $invoice_no,
        //         'order_id' => $order_id,
        //         'total_pay' => $this->total_pay,
        //         'project_id' => $this->project->id,
        //         'invoice_type' => $this->invoice_type,
        //         'status' => 0,
        //         'payment_method' => $status
        //     ]);
        //     $this->dispatchBrowserEvent('swal',
        //         ['icon' => 'success',
        //         'title' => 'Berhasil',
        //         'html' =>  'Berhasil membuat Invoice untuk proyek : <b>'.$this->project->project_name.'</b>',
        //         'showConfirmButton' => false,
        //         'timer' => 1500
        //         ]
        //     );

        // }

    }

    public function render()
    {
        return view('livewire.create-project-invoice')
                ->extends('templates.dashboard')
                ->section('content');
    }
}
