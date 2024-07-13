<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalDisputeHandler extends Model
{
    use HasFactory;

    protected $fillable = [
        "legal_dispute_id",
        "employee_id",
        "start_date",
        "end_date"
    ];

    public function legalDispute() 
    {
        return $this->belongsTo(LegalDispute::class);    
    }

    public function handler() 
    {
        return $this->belongsTo(Employee::class);    
    }

    
}
