<?php

namespace App\Http\Livewire;

use App\Ledger;
use App\Project;
use App\Transaction;
use Livewire\Component;

class FinanceList extends Component
{

    public $income_month;
    public $ledgers_month;
    public $profit_month;

    public function mount(){
        $thisMonth = date("m");
        $projectMonth = Project::whereMonth('created_at', $thisMonth)->sum('estimate_budget');
        $transactionMonth = Transaction::whereMonth('created_at', $thisMonth)->sum('total_pay');
        $this->profit_month = ($projectMonth+$transactionMonth) - Ledger::whereMonth('created_at', $thisMonth)->sum('ammount');
        $this->income_month = $projectMonth+$transactionMonth;
        $this->ledgers_month = Ledger::whereMonth('created_at', $thisMonth)->sum('ammount');
    }

    public function render()
    {
        return view('livewire.finance-list');
    }
}
