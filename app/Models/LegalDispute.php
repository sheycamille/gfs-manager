<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalDispute extends Model
{
    use HasFactory;

    protected $fillable = [
        "subject",
        "legal_basis",
        "desired_outcome",
        "complain_date",
        "end_date",
        "status",
        "conclusion",
    ];

    public function partiesInvolved()
    {
        return $this->hasMany(LegalDisputeInvolvedParties::class);    
    }

    public function resources()
    {
        return $this->hasMany(LegalDisputeResource::class);    
    }

    public function procedures()
    {
        return $this->hasMany(LegalDisputeInvolvedProcedure::class);    
    }
    public function handlers()
    {
        return $this->hasMany(LegalDisputeHandler::class);    
    }
    
    public function consultants()
    {
        return $this->hasMany(LegalDisputeConsultant::class);    
    }
    
    
}
