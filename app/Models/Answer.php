<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function audit()
    {
        return $this->belongsTo(Audit::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
