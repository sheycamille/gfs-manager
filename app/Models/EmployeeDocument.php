<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDocument extends Model
{
    protected $fillable = [
        'employee_id','employee_document_type_id','document_id','document_value','created_by'
    ];

    public function employeeDocumentType() 
    {
        return $this->belongsTo(EmployeeDocumentType::class);    
    }
    public function employee() 
    {
        return $this->belongsTo(Employee::class);    
    }
    
}
