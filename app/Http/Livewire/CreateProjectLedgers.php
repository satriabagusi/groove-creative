<?php

namespace App\Http\Livewire;

use App\Ledger;
use App\Project;
use App\Project_ledger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProjectLedgers extends Component
{
    use WithFileUploads;

    public $project, $ledger_description, $ledger_ammount, $invoice_pembelian, $project_id;

    protected $rules = [
        'ledger_description' => 'required',
        'ledger_ammount' => 'required|not_in:0|numeric',
        'invoice_pembelian' => 'required|image|mimes:jpg,jpeg,png',
        'project_id' => 'required',
    ];

    protected $messages = [
        'ledger_description.required' => 'Deskripsi pengeluaran belum di isi.',
        'ledger_ammount.required' => 'Jumlah pengeluaran belum di isi.',
        'ledger_ammount.not_in' => 'Jumlah pengeluaran tidak valid',
        'ledger_ammount.numeric' => 'Jumlah pengeluaran tidak valid',
        'invoice_pembelian.required' => 'Bukti pembayaran belum dipilih.',
        'invoice_pembelian.image' => 'Tipe File salah.',
        'invoice_pembelian.mimes' => 'Tipe File salah. Harus *jpg, *jpeg, *png',
        'project_id.required' => 'Proyek belum dipilih.'
    ];

    public function mount(){
        $this->project = Project::get();
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function saveLedgerData(){
        $validatedData = $this->validate();

        $fileName = md5($this->invoice_pembelian.microtime()).'.'.$this->invoice_pembelian->extension();
        $this->invoice_pembelian->storeAs('img/proyek/invoice_pembelian', $fileName, 'public');

        $ledger = Ledger::create([
            'ammount' => $this->ledger_ammount,
            'invoice_pembelian' => $fileName,
            'description' => $this->ledger_description
        ]);

        $projectLedger = Project_ledger::create([
            'ledger_id' => $ledger->id,
            'project_id' => $this->project_id,
        ]);

        $this->dispatchBrowserEvent('swal',
            ['icon' => 'success',
            'title' => 'Berhasil',
            'html' =>  'Input pengeluaran Proyek Berhasil.',
            'showConfirmButton' => false,
            'timer' => 1500
            ]
        );

        return redirect()->to(url('/dashboard/project/detail/'.$this->project_id));

    }


    public function render()
    {
        return view('livewire.create-project-ledgers')
                ->extends('templates.dashboard')
                ->section('content');
    }
}
