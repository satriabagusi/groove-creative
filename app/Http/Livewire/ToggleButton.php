<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ToggleButton extends Component
{

    public Model $model;
    public string $field;
    public bool $isActive;

    public $uniqueId;

    public function mount(){
        $this->isActive = (bool) $this->model->getAttribute($this->field);
        $this->uniqueId = uniqid();
    }

    public function render()
    {
        return view('livewire.toggle-button');
    }

    public function updating($field, $value){
        $this->model->setAttribute($this->field, $value)->save();
    }
}
