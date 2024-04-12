<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeContract extends Model
{
    use HasFactory;

    // $table->bigIncrements('id');
    //         $table->integer('employee_id');
    //         $table->integer('contract_type_id');
    //         $table->integer('template_id')->nullable();
    //         $table->date('start_date');
    //         $table->date('end_date');
    //         $table->string('description')->nullable();
    //         $table->text('contract_description')->nullable();
    //         $table->string('status')->default('pending');;
    //         $table->longText('client_signature')->nullable();
    //         $table->longText('company_signature')->nullable();
    //         $table->integer('created_by');

    protected $fillable = [
        'employee_id',
        'contract_type_id',
        'template_id',
        'start_date',
        'end_date',
        'description',
        'contract_description',
        'status',
        'client_signature',
        'company_signature',
        'created_by'
    ];

    public function employee()
    {
        $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function contractType()
    {
        $this->belongsTo(ContractType::class, 'contract_type_id', 'id');
    }

    public function createdBy()
    {
        $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function template()
    {
        $this->belongsTo(EmployeeContractTemplate::class, 'template_id', 'id');
    }
}
