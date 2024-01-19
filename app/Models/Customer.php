<?php

namespace App\Models;

use App\Models\Audit;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\LengthExceededException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'progress_percentage',
    ];

    public function audits()
    {
        return $this->hasMany(Audit::class);
    }

    public function updateProgressPercentage(): void
    {
        $totalQuestions = strlen($this->company_name);
        $answeredQuestions = $this->audits->flatMap->answers->count();

        if ($answeredQuestions > $totalQuestions) {
            throw new LengthExceededException("Cannot add more questions than the length of the company name.");
        }

        $progressPercentage = ($answeredQuestions / $totalQuestions) * 100;
        $this->progress_percentage = $progressPercentage;
        $this->save();
    }

    public function checkQuestionProgress(): void
    {
        // Assuming $expectedProgress is the expected progress percentage
        $expectedProgress = 100; // Adjust this value accordingly

        // Calculate progress percentage
        $totalQuestions = strlen($this->company_name);

        $answeredQuestions = $this->audits->flatMap(function ($audit) {
            return $audit->answers->pluck('name');
        })->unique()->count();

        $progressPercentage = ($answeredQuestions / $totalQuestions) * 100;

        // Log total questions, answered questions, and progress percentage
        Log::info("Customer {$this->id} - Total Questions: {$totalQuestions}, Answered Questions: {$answeredQuestions}");
        Log::info("Customer {$this->id} - Progress Percentage: {$progressPercentage}%");

        // Check if progress is correct
        if ($progressPercentage === $expectedProgress) {
            Log::info("Customer {$this->id} - Question Progress is correct.");
        } else {
            Log::error("Customer {$this->id} - Question Progress is incorrect.");

            // Only update progress percentage if it's not already over 100%
            if ($progressPercentage <= 100) {
                $this->progress_percentage = $progressPercentage;
                $this->save();
                Log::info("Customer {$this->id} - Updated progress percentage to {$progressPercentage}%.");
            } else {
                Log::info("Customer {$this->id} - Progress percentage exceeds 100%, no update performed.");
            }
        }
    }
}
