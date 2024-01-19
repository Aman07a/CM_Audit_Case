<?php

// app\Console\Commands\CheckQuestionProgress.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customer;
use App\Jobs\CheckQuestionProgressJob;
use Illuminate\Support\Facades\Log;

class CheckQuestionProgress extends Command
{
    protected $signature = 'app:check-question-progress';
    protected $description = 'Check question progress for each customer';

    public function handle()
    {
        // Set the last customer's progress to an invalid state
        $lastCustomer = Customer::latest()->first();
        $lastCustomer->update(['progress_percentage' => -1]);

        // Dispatch a job for each customer
        Customer::chunk(10, function ($customers) {
            foreach ($customers as $customer) {
                CheckQuestionProgressJob::dispatch($customer);
            }
        });

        $this->info('Job dispatched for each customer. Check the logs for progress verification results.');
    }
}
