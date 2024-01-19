<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\LengthExceededException;

class Customer extends Model
{
    use HasFactory;

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
}
