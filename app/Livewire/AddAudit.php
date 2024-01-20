<?php
// app/Livewire/AddAudit.php

namespace App\Livewire;

use App\Models\User;
use App\Models\Audit;
use Livewire\Component;
use App\Models\Customer;

class AddAudit extends Component
{
    public $user_id;
    public $customer_id;
    public $auditName;
    public $questionProgressPercentage;

    // Declare properties to store users and customers
    public $users;
    public $customers;

    // Mount method to initialize data when the component is first loaded
    public function mount()
    {
        // Retrieve users and customers and make them available to the Livewire component
        $this->users = User::all();
        $this->customers = Customer::all();
    }

    public function addItem()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:customers,id',
            'auditName' => 'required|string|max:255',
            'questionProgressPercentage' => 'required|numeric|between:0,100',
        ]);

        // Find the user and customer based on the provided IDs
        $user = User::find($this->user_id);
        $customer = Customer::find($this->customer_id);

        // Check if user and customer are found
        if (!$user || !$customer) {
            // Handle the case when user or customer is not found
            // You can add a validation error or perform other actions as needed
            $this->addError('user_id', 'User not found');
            $this->addError('customer_id', 'Customer not found');
            return;
        }

        // Validate and create the audit
        $audit = Audit::create([
            'user_id' => $user->id,
            'customer_id' => $customer->id,
            'name' => $this->auditName,
            'question_progress_percentage' => $this->questionProgressPercentage,
            // Add any other necessary fields here
        ]);

        // Clear the input fields after adding the audit
        $this->user_id = '';
        $this->customer_id = '';
        $this->auditName = '';
        $this->questionProgressPercentage = '';

        // Optionally, you can emit an event if needed
        $this->dispatch('auditAdded', ['message' => 'Audit added successfully']);
    }

    public function render()
    {
        // Pass users and customers to the Livewire component view
        return view('livewire.add-audit', [
            'users' => $this->users,
            'customers' => $this->customers,
        ]);
    }
}
