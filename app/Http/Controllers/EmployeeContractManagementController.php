<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeContract;
use App\Models\EmployeeContractTemplate;
use App\Models\ContractType;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeContractManagementController extends Controller
{
    public function index(){
        $contracts = EmployeeContract::orderBy('created_at', 'desc')->get();
        return view('employeeContractManagement.index', ['contracts' => $contracts]);
    }

    public function create(){
        $templates = EmployeeContractTemplate::all();
        $contractTypes = ContractType::all();
        $employees = Employee::all();
        return view('employeeContractManagement.create', [
            'templates' => $templates, 
            'contractTypes' => $contractTypes,
            'employees' => $employees,
        ]);
    }

    public function edit($id){
        $templates = EmployeeContractTemplate::all();
        $contractTypes = ContractType::all();
        $employees = Employee::all();
        $contract = EmployeeContract::find($id);
        if ($contract == null) {
            return back()->with("error", "Contract Not Found");
        }
        return view('employeeContractManagement.edit', [
            'templates' => $templates, 
            'contractTypes' => $contractTypes,
            'employees' => $employees,
            'contract' => $contract,
        ]);
    }

    public function store(Request $request) 
    {
        $data = $request->validate([
            'employee_id' => "required|exists:employees,id",
            'contract_type_id' => "required|exists:contract_types,id",
            'template_id' => "required|exists:employee_contract_templates,id",
            'start_date' => "required|date",
            'end_date' => "required|date",
            'description' => "sometimes",
            'contract_value' => "required",
            'file' => "sometimes",
            'status' => "required"
        ]);
        
        $data["created_by"] = Auth::user()->creatorId();
        EmployeeContract::create($data);

        return redirect()->route("employees.contract.index")->with("success" ,"Contract stored successfully");
    }
    public function update(Request $request, $id) 
    {
        $data = $request->validate([
            'employee_id' => "required|exists:employees,id",
            'contract_type_id' => "required|exists:contract_types,id",
            'template_id' => "required|exists:employee_contract_templates,id",
            'start_date' => "required|date",
            'end_date' => "required|date",
            'description' => "sometimes",
            'contract_value' => "required",
            'file' => "sometimes",
            'status' => "required"
        ]);
        $contract = EmployeeContract::find($id);
        if ($contract == null) {
            return back()->with("error", "Contract Not Found");
        }
        
        $contract->update($data);

        return redirect()->route("employees.contract.index")->with("success" ,"Contract updated successfully");
    }

    public function destroy(Request $request, $id) 
    {
        $contract = EmployeeContract::find($id);
        if ($contract == null) {
            return back()->with("error", "Contract Not Found");
        }
        
        $contract->delete();

        return redirect()->route("employees.contract.index")->with("success" ,"Contract deleted successfully");
    }

    
    
}
