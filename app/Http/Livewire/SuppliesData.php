<?php

namespace App\Http\Livewire;

use App\Supply;
use Livewire\Component;
use Livewire\WithPagination;

class SuppliesData extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public $supply_name, $price, $stock, $selected_id;
    public $editMode = false;

    protected $listeners = [
        'supplyDataAdded',
        'deleteSupply',
    ];

    protected $rules = [
        'supply_name' => 'required|unique:supplies',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|numeric|min:0'
    ];

    protected $messages = [
        'supply_name.required' => 'Nama Barang tidak Boleh Kosong.',
        'supply_name.unique' => 'Barang yang sama tidak bisa di input lagi.',
        'price.required' => 'Harga Barang tidak Boleh Kosong.',
        'price.numeric' => 'Format Harga barang tidak sesuai.',
        'price.min' => 'Harga barang tidak sesuai.',
        'stock.required' => 'Stock Barang tidak boleh Kosong',
        'stock.numeric' => 'Format Stock barang tidak sesuai.',
        'stock.min' => 'Stock barang tidak sesuai.',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function saveSupplyData(){
        $validatedData = $this->validate();
        Supply::create($validatedData);
        $this->reset();
        $this->dispatchBrowserEvent('swal',
            ['icon' => 'success',
            'title' => 'Berhasil Input data Barang',
            'showConfirmButton' => false,
            'timer' => 1500
            ]
        );
    }

    public function editSupply($id){

        $data = Supply::findOrFail($id);

        $this->selected_id = $id;
        $this->supply_name = $data->supply_name;
        $this->price = $data->price;
        $this->stock = $data->stock;

        $this->editMode = true;
    }

    public function updateSupply(){
        $data = Supply::findOrFail($this->selected_id);
        $this->supply_name = $data->supply_name;
        $this->validate([
            'selected_id' => 'required|numeric',
            'supply_name' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|same:stock',
        ],
        [
            'selected_id.required' => 'ID barang kosong.',
            'selected_id.numeric' => 'ID barang tidak sesuai.',
            'supply_name.required' => 'Nama Barang tidak Boleh Kosong.',
            'price.required' => 'Harga Barang tidak Boleh Kosong.',
            'price.numeric' => 'Format Harga barang tidak sesuai.',
            'price.min' => 'Harga barang tidak sesuai.',
            'stock.required' => 'Stock Barang tidak boleh Kosong',
            'stock.numeric' => 'Format Stock barang tidak sesuai.',
            'stock.same' => 'Stock barang tidak sesuai.',
        ]);

        if($this->selected_id){
            Supply::where('id', $this->selected_id)
            ->update([
                'supply_name' => $this->supply_name,
                'price' => $this->price,
            ]);
        }
        $this->reset();
        $this->editMode = false;

        $this->dispatchBrowserEvent('swal',
            ['icon' => 'success',
            'title' => 'Berhasil',
            'html' =>  'Berhasil update data <b>'.$data->supply_name.'</b>',
            'showConfirmButton' => false,
            'timer' => 1500
            ]
        );

    }

    public function deleteWindow($id){
        $data = Supply::findOrFail($id);
        $this->dispatchBrowserEvent('swal:confirm',
            [
                'id' => $id,
                'icon' => 'warning',
                'title' => 'Menghapus Data',
                'html' => 'Yakin ingin menghapus data <b>'.$data->supply_name.'</b> ?',
                'showCancelButton' => true,
                'confirmButtonText' => 'Hapus',
                'cancelButtonText' => 'Batal',
                'dangerMode' => true,
            ]
        );
    }

    public function deleteSupply($id){
        if($id){
            $deleted = Supply::where('id', $id)->delete();
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

    public function render()
    {
        $s = '%'.$this->search.'%';
        $supplies = Supply::where('supply_name', 'like', $s)->paginate(10);
        return view('livewire.supplies-data', compact('supplies'));
    }
}
