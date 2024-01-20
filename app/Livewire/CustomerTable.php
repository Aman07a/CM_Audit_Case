<?php

namespace App\Livewire;

use App\Models\Customer;
use Livewire\Component;

class CustomerTable extends Component
{
    public function render()
    {
        $customers = Customer::all();
        return view('livewire.customer-table', compact('customers'));
    }
}
