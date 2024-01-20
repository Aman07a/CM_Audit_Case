<?php

namespace App\Livewire;

use App\Models\Audit;
use Livewire\Component;

class AuditTable extends Component
{
    public function render()
    {
        $audits = Audit::all();
        return view('livewire.audit-table', compact('audits'));
    }
}
