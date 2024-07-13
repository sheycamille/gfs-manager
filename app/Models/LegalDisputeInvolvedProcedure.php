<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalDisputeInvolvedProcedure extends Model
{
    use HasFactory;

    protected $fillable = [
        "legal_dispute_id",
        "name",
        "description",
        "attachment",
        "procedure_date",
    ];

    public function legalDispute() 
    {
        return $this->belongsTo(LegalDispute::class);
    }
}
