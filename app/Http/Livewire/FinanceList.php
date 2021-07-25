<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FinanceList extends Component
{

    public $income_month;
    public $ledgers_month;
    public $profit_month;

    public function mount(){
        $this->income_month = 35600000;
        $this->ledgers_month = 15340000;
        $this->profit_month = 20260000;
    }

    public function render()
    {
        return view('livewire.finance-list');
    }
}
