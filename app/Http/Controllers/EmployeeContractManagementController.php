<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeContract;
use App\Models\EmployeeContractTemplate;
use App\Models\ContractType;

class EmployeeContractManagementController extends Controller
{
    public function index(){
        $contracts = EmployeeContract::orderBy('created_at', 'desc')->get();
        return view('employeeContractManagement.index', ['contracts' => $contracts]);
    }

    public function create(){
        $templates = EmployeeContractTemplate::all();
        $contractTypes = ContractType::all();
        return view('employeeContractManagement.create', ['templates' => $templates, 'contractTypes' => $contractTypes]);
    }
}
