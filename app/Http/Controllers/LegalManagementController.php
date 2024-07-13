<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\LegalDispute;
use App\Models\LegalDisputeConsultant;
use App\Models\LegalDisputeHandler;
use App\Models\LegalDisputeInvolvedParties;
use App\Models\LegalDisputeInvolvedProcedure;
use App\Models\LegalDisputeResource;
use App\Models\Utility;
use Illuminate\Http\Request;

class LegalManagementController extends Controller
{
    // disputes
    public function disputes()
    {
        $disputes = LegalDispute::all();
        return view('legal-management.dispute-management.index', compact("disputes"));
    }

    public function createDispute(Request $request) 
    {
        $employees = Employee::all();
        $customers = Customer::all();
        return view('legal-management.dispute-management.create',compact("employees","customers"));
    }
    
    public function editDispute(Request $request, $id) 
    {
        $dispute = LegalDispute::with("partiesInvolved","resources","procedures","handlers","consultants")->find($id);
        if ($dispute == null) {
            return back()->with("error","Dispute not found");
        }
        $employees = Employee::all();
        $customers = Customer::all();
        $procedures = LegalDisputeInvolvedProcedure::where("legal_dispute_id",$dispute->id)->get();
        $resources = LegalDisputeResource::where("legal_dispute_id",$dispute->id)->get();
        return view('legal-management.dispute-management.edit',compact("employees","customers","dispute","procedures","resources"));
    }
    
    public function storeDispute(Request $request) 
    {
        $data = $request->validate([
            "subject" => "required",
            "legal_basis" => "required",
            "desired_outcome" => "required",
            "complain_date" => "required|date",
            "end_date" => "sometimes",
            "status" => "required|numeric",
            "conclusion" => "sometimes",
            "resources" => "sometimes|array",
            "procedures" => "sometimes|array",
            "employees" => "sometimes|array",
            "customers" => "sometimes|array",
            "handlers" => "sometimes|array",
            "consultants" => "sometimes|array",
        ]);

        if (isset($data["employees"])) {
            unset($data["employees"]);
        }
        if (isset($data["resources"])) {
            unset($data["resources"]);
        }
        if (isset($data["procedures"])) {
            unset($data["procedures"]);
        }
        if (isset($data["customers"])) {
            unset($data["customers"]);
        }
        if (isset($data["handlers"])) {
            unset($data["handlers"]);
        }
        if (isset($data["consultants"])) {
            unset($data["consultants"]);
        }
        
        $dispute = LegalDispute::create($data);
        if ($request->resources != null && is_array($request->resources)) {
            foreach ($request->resources as $resource) {
                $resource["legal_dispute_id"] = $dispute->id;
                if (isset($resource["file"]) && is_file($resource["file"])) {
                    $resource["file_url"] = Utility::uploadFile($resource["file"], "legal-dispute-resources");
                }
                LegalDisputeResource::create($resource);
            }
        }
        if ($request->procedures != null && is_array($request->procedures)) {
            foreach ($request->procedures as $procedure) {
                $procedure["legal_dispute_id"] = $dispute->id;
                LegalDisputeInvolvedProcedure::create($procedure);
            }
        }
        if ($request->customers != null && is_array($request->customers)) {
            foreach ($request->customers as $customer) {
                LegalDisputeInvolvedParties::create([
                    "legal_dispute_id" => $dispute->id,
                    "type" => "CUSTOMER",
                    "customer_id" => $customer
                ]);
            }
        }
        if ($request->employees != null && is_array($request->employees)) {
            foreach ($request->employees as $employee) {
                LegalDisputeInvolvedParties::create([
                    "legal_dispute_id" => $dispute->id,
                    "type" => "EMPLOYEE",
                    "employee_id" => $employee
                ]);
            }
        }
        if ($request->handlers != null && is_array($request->handlers)) {
            foreach ($request->handlers as $handler) {
                $handler["legal_dispute_id"] = $dispute->id;
                LegalDisputeHandler::create($handler);
            }
        }

        if ($request->consultants != null && is_array($request->consultants)) {
            foreach ($request->consultants as $consultant) {
                $consultant["legal_dispute_id"] = $dispute->id;
                LegalDisputeConsultant::create($consultant);
            }
        }
        return redirect()->route("disputes.index")->with("success","Dispute created successfully");
    }
    
    public function updateDispute(Request $request, $id) 
    {
        $data = $request->validate([
            "subject" => "required",
            "legal_basis" => "required",
            "desired_outcome" => "required",
            "complain_date" => "required|date",
            "end_date" => "sometimes",
            "status" => "required|numeric",
            "conclusion" => "sometimes",
            "resources" => "sometimes|array",
            "procedures" => "sometimes|array",
            "employees" => "sometimes|array",
            "customers" => "sometimes|array",
            "handlers" => "sometimes|array",
            "consultants" => "sometimes|array",
        ]);

        $dispute = LegalDispute::find($id);
        if ($dispute == null) {
            return back()->with("error","Dispute not found");
        }
        if (isset($data["employees"])) {
            unset($data["employees"]);
        }
        if (isset($data["resources"])) {
            unset($data["resources"]);
        }
        if (isset($data["procedures"])) {
            unset($data["procedures"]);
        }
        if (isset($data["customers"])) {
            unset($data["customers"]);
        }
        if (isset($data["handlers"])) {
            unset($data["handlers"]);
        }
        if (isset($data["consultants"])) {
            unset($data["consultants"]);
        }
        
        $dispute->update($data);
        LegalDisputeResource::where("legal_dispute_id",$dispute->id)->delete();
        if ($request->resources != null && is_array($request->resources)) {
            foreach ($request->resources as $resource) {
                $resource["legal_dispute_id"] = $dispute->id;
                if (isset($resource["file"]) && is_file($resource["file"])) {
                    $resource["file_url"] = Utility::uploadFile($resource["file"], "legal-dispute-resources");
                } else {
                    $resource["file_url"] = $resource["prev_file"];
                    unset($resource["prev_file"]);
                }
                LegalDisputeResource::create($resource);
            }
        }

        LegalDisputeInvolvedProcedure::where("legal_dispute_id",$dispute->id)->delete();
        if ($request->procedures != null && is_array($request->procedures)) {
            foreach ($request->procedures as $procedure) {
                $procedure["legal_dispute_id"] = $dispute->id;
                LegalDisputeInvolvedProcedure::create($procedure);
            }
        }

        LegalDisputeInvolvedParties::where("legal_dispute_id",$dispute->id)->where("type","CUSTOMER")->delete();
        if ($request->customers != null && is_array($request->customers)) {
            foreach ($request->customers as $customer) {
                LegalDisputeInvolvedParties::create([
                    "legal_dispute_id" => $dispute->id,
                    "type" => "CUSTOMER",
                    "customer_id" => $customer
                ]);
            }
        }

        LegalDisputeInvolvedParties::where("legal_dispute_id",$dispute->id)->where("type","EMPLOYEE")->delete();
        if ($request->employees != null && is_array($request->employees)) {
            foreach ($request->employees as $employee) {
                LegalDisputeInvolvedParties::create([
                    "legal_dispute_id" => $dispute->id,
                    "type" => "EMPLOYEE",
                    "employee_id" => $employee
                ]);
            }
        }

        LegalDisputeHandler::where("legal_dispute_id",$dispute->id)->delete();
        if ($request->handlers != null && is_array($request->handlers)) {
            foreach ($request->handlers as $handler) {
                $handler["legal_dispute_id"] = $dispute->id;
                LegalDisputeHandler::create($handler);
            }
        }

        LegalDisputeConsultant::where("legal_dispute_id",$dispute->id)->delete();
        if ($request->consultants != null && is_array($request->consultants)) {
            foreach ($request->consultants as $consultant) {
                $consultant["legal_dispute_id"] = $dispute->id;
                LegalDisputeConsultant::create($consultant);
            }
        }
        
        return redirect()->route("disputes.index")->with("success","Dispute Updated successfully");
    }
    
    public function destroyDispute($id) 
    {
        LegalDispute::where("id",$id)->delete();
        return redirect()->route("disputes.index")->with("success","Dispute created successfully");
    }

    public function storeDisputeProcedure(Request $request, $id) 
    {
        $procedure = $request->validate([]); 
        $procedure["legal_dispute_id"] = $id;
        LegalDisputeInvolvedProcedure::create($procedure);
        return redirect()->route("disputes.index")->with("success","Procedure added successfully");
    }

    public function storeDisputeResource(Request $request, $id) 
    {
        $data = $request->validate([]); 
        $data["legal_dispute_id"] = $id;
        if (isset($data["file"]) && is_file($data["file"])) {
            $data["file_url"] = Utility::uploadFile($data["file"], "legal-dispute-resources");
        }
        LegalDisputeResource::create($data);
        return redirect()->route("disputes.index")->with("success","Resource added successfully");
    }

    public function storeDisputeConsultant(Request $request, $id) 
    {
        $consultant = $request->validate([]); 
        $consultant["legal_dispute_id"] = $id;
        LegalDisputeConsultant::create($consultant);

        return redirect()->route("disputes.index")->with("success","Consultant added successfully");
    }

    public function storeDisputeHandler(Request $request, $id) 
    {
        $request->validate([]); 
        $handler["legal_dispute_id"] = $id;
        LegalDisputeHandler::create($handler);
        return redirect()->route("disputes.index")->with("success","Handler added successfully");
    }


    public function createDisputeProcedure($id) 
    {
        return view("legal-management.dispute-management.procedures",["id" => $id]);
    }

    public function createDisputeResource($id) 
    {
        return view("legal-management.dispute-management.resources",["id" => $id]);
    }

    public function createDisputeConsultant(Request $request, $id) 
    {
        return view("legal-management.dispute-management.consultants",["id" => $id]);
    }

    public function createDisputeHandler(Request $request, $id) 
    {
        $employees = Employee::all();
        return view("legal-management.dispute-management.handers",["id" => $id, "employees" => $employees]);
    }

    
    public function insuranceManagement(){

        return view('legal-management.insurance-management');
        
    }
}
