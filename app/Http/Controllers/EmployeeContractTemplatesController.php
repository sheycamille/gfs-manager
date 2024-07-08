<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeContractTemplate;
use App\Models\ContractType;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeContractTemplatesController extends Controller
{
    public function index(){
        $templates = EmployeeContractTemplate::orderBy('created_at', 'desc')->get();
        return view('employeeContractManagement.templates.index', ['templates' => $templates]);
    }

    public function create(){
        return view('employeeContractManagement.templates.create');
    }

    public function edit($id){
        $template = EmployeeContractTemplate::find($id);
        if ($template == null) {
            return back()->with("error", "Contract Not Found");
        }
        return view('employeeContractManagement.templates.edit', [
            'template' => $template
        ]);
    }

    public function store(Request $request) 
    {
        $data = $request->validate([
            'name' => "required",
            'content' => "required"
        ]);
        
        $data["created_by"] = Auth::user()->creatorId();
        EmployeeContractTemplate::create($data);

        return redirect()->route("employee.contract.template.index")->with("success" ,"Contract stored successfully");
    }
    public function update(Request $request, $id) 
    {
        $data = $request->validate([
            'name' => "required",
            'content' => "required"
        ]);
        $template = EmployeeContractTemplate::find($id);
        if ($template == null) {
            return back()->with("error", "Contract Not Found");
        }
        
        $template->update($data);

        return redirect()->route("employee.contract.template.index")->with("success" ,"Contract updated successfully");
    }

    public function destroy(Request $request, $id) 
    {
        $template = EmployeeContractTemplate::find($id);
        if ($template == null) {
            return back()->with("error", "Contract Not Found");
        }
        
        $template->delete();

        return redirect()->route("employee.contract.template.index")->with("success" ,"Contract deleted successfully");
    }

    
    
}
