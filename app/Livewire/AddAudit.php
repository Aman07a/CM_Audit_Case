<?php
// app/Livewire/AddAudit.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Audit;

class AddAudit extends Component
{
    public $auditName;
    public $questionProgressPercentage;

    public function addItem()
    {
        $this->validate([
            'auditName' => 'required|string|max:255',
            'questionProgressPercentage' => 'required|numeric|between:0,100',
        ]);

        // Create and save the audit
        Audit::create([
            'name' => $this->auditName,
            'question_progress_percentage' => $this->questionProgressPercentage,
            // Add any other necessary fields here
        ]);

        // Clear the input fields after adding the audit
        $this->auditName = '';
        $this->questionProgressPercentage = '';

        // You can emit an event or perform any other actions if needed

        // Render the Livewire component again after adding the audit
        $this->emit('auditAdded');
    }

    public function render()
    {
        return view('livewire.add-audit');
    }
}
