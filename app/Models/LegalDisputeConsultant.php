<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalDisputeConsultant extends Model
{
    use HasFactory;

    protected $fillable = [
        "legal_dispute_id",
        "name",
        "job_title",
        "description",
        "start_date",
        "end_date"
    ];
}
