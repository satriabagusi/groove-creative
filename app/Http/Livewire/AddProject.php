<?php

namespace App\Http\Livewire;

use App\Project;
use App\Project_invoice;
use App\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProject extends Component
{

    use WithFileUploads;

    public $project_name, $project_description, $project_status, $project_leader_id, $client_name, $client_contact, $estimate_budget, $pay_status;
    public $total_pay = 0;
    public $bukti_pembayaran;

    protected $rules = [
        'project_name' => 'required',
        'project_description' => 'required',
        'project_status' => 'required|numeric|max:3|min:0',
        'project_leader_id' => 'required|numeric',
        'client_name' => 'required',
        'client_contact' => 'required|email',
        'estimate_budget' => 'required|numeric',
        'pay_status' => 'required|numeric|max:2',
        'total_pay' => 'numeric|exclude_unless:pay_status,1|lte:estimate_budget|min:1',
        'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png',
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
        'client_contact.email' => 'Kontak Klien berupa email.',
        'estimate_budget.required' => 'Estimasi Anggaran kosong.',
        'estimate_budget.numeric' => 'Format Estimasi Anggaran tidak sesuai.',
        'pay_status.required' => 'Status pembayaran Kosong.',
        'pay_status.numeric' => 'Format Status Pembayaran tidak sesuai.',
        'pay_status.max' => 'Format Status Pembayaran tidak sesuai.',
        'total_pay.numeric' => 'Format Total Pembayaran tidak sesuai.',
        'total_pay.lte' => 'Total Pembayaran melebihi estimasi Anggaran Proyek',
        'total_pay.min' => 'Total pembayaran adalah 0',
        'bukti_pembayaran.required' => 'Bukti pembayaran belum dipilih.',
        'bukti_pembayaran.image' => 'Tipe File salah.',
        'bukti_pembayaran.mimes' => 'Tipe File salah.'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function saveProjectData(){
        $validatedData = $this->validate();

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $order_id = substr(str_shuffle($permitted_chars), 0, 10);

        $orderId_exist = Project_invoice::where('order_id', $order_id)->first();

        if($orderId_exist){
            $order_id = substr(str_shuffle($permitted_chars), 0, 10);
        }

        if($this->pay_status == 2){
            $validatedData = $this->validate([
                'total_pay' => 'same:estimate_budget|required'
            ],[
                'total_pay.same' => 'Total pembayaran tidak sama dengan budget proyek.',
                'total_pay.required' => 'Total pembayaran kosong.'
            ]);
        }

        // dd($this->bukti_pembayaran);

        if($this->pay_status == 0){
            DB::transaction(function () {
                Project::create([
                    'project_name' => $this->project_name,
                    'client_name' => $this->client_name,
                    'client_email' => $this->client_contact,
                    'estimate_budget' => $this->estimate_budget,
                    'project_status' => $this->project_status,
                    'pay_status' => $this->pay_status,
                    'project_description' => $this->project_description,
                    'project_leader_id' => $this->project_leader_id,
                ]);
            });
        }elseif($this->pay_status == 1 || $this->pay_status == 2){
            DB::transaction(function () use($order_id) {
                $date = date("Y");
                $id = Project_invoice::select('no_invoice')->latest('id')->first();
                $id = substr($id->no_invoice, 0,1)+1;
                $invoice_no = $id.'/GC/V/'.$date;

                $project = Project::create([
                    'project_name' => $this->project_name,
                    'client_name' => $this->client_name,
                    'client_email' => $this->client_contact,
                    'estimate_budget' => $this->estimate_budget,
                    'project_status' => $this->project_status,
                    'pay_status' => $this->pay_status,
                    'project_description' => $this->project_description,
                    'project_leader_id' => $this->project_leader_id,
                ]);

                $fileName = md5($this->bukti_pembayaran.microtime()).'.'.$this->bukti_pembayaran->extension();
                $this->bukti_pembayaran->storeAs('img/bukti_pembayaran', $fileName, 'public');

                Project_invoice::create([
                    'no_invoice' => $invoice_no,
                    'order_id' => $order_id,
                    'total_pay' => $this->total_pay,
                    'project_id' => $project->id,
                    'bukti_pembayaran' => $fileName,
                    'status' => 1,
                ]);
            });
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
