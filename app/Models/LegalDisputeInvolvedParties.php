<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalDisputeInvolvedParties extends Model
{
    use HasFactory;

    protected $fillable = [
        "legal_dispute_id",
        "type",
        "employee_id",
        "customer_id"
    ];

    public function legalDispute() 
    {
        return $this->belongsTo(LegalDispute::class);
    }

    public function employee() 
    {
        return $this->belongsTo(Employee::class);
    }

    public function customer() 
    {
        return $this->belongsTo(Customer::class);
    }

    
}
