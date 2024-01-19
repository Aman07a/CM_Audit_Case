<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;

class CheckQuestionProgressJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function handle()
    {
        // Check if Question Progress is correct
        $correctProgress = $this->customer->checkQuestionProgress();

        // Log appropriate message
        if ($correctProgress) {
            Log::info("Customer {$this->customer->id} - Question Progress is correct.");
        } else {
            Log::error("Customer {$this->customer->id} - Question Progress is incorrect.");
        }
    }
}
