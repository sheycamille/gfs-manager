<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalDisputeResource extends Model
{
    use HasFactory;

    protected $fillable = [
        "legal_dispute_id",
        "name",
        "file_url",
        "description",
    ];

    public function legalDispute() 
    {
        return $this->belongsTo(LegalDispute::class);
    }
}
