<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeDocument;
use App\Models\EmployeeDocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EmployeeDocumentController extends Controller
{
    public function index() 
    {
        $documents = EmployeeDocument::with("employee","employeeDocumentType")->get(); 
        
        return view("employeeDocuments.index",compact("documents"));
    }

    public function create() 
    {
        $employees = Employee::all(); 
        $types = EmployeeDocumentType::all(); 
        
        return view("employeeDocuments.create",compact("employees","types"));
    }

    public function edit($id) 
    {
        $document = EmployeeDocument::find($id);
        if ($document == null) {
            return back()->with("error","Unkonwn Employee Document");
        }
        $employees = Employee::all(); 
        $types = EmployeeDocumentType::all(); 
        
        return view("employeeDocuments.edit",compact("employees","document","types"));
    }

    public function store(Request $request) 
    {
        $request->validate([
            "employee_id" => "required|exists:employees,id",
            "document" => "required|file",
            "document_type_id" => "required|exists:employee_document_types,id",
        ]);

        if($request->hasFile('document'))
        {
            // foreach($request->document as $key => $document)
            // {

                
            // }
            $filenameWithExt = $request->file('document')->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $request->file('document')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $dir             = storage_path('uploads/document/');
            $image_path      = $dir . $filenameWithExt;

            if(File::exists($image_path))
            {
                File::delete($image_path);
            }

            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $path = $request->file('document')->move(public_path('uploads/document/'), $fileNameToStore);
            $employee_document = EmployeeDocument::create(
                [
                    'employee_id' => $request->employee_id,
                    'document_id' => 1, //review here
                    'employee_document_type_id' => $request->document_type_id,
                    'document_value' => $fileNameToStore,
                    'created_by' => Auth::user()->creatorId(),
                ]
            );
            $employee_document->save();

        }

        return redirect()->route("employee-documents.index")->with("success","operation success");
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            "employee_id" => "required|exists:employees,id",
            "document" => "sometimes|file",
            "document_type_id" => "required|exists:employee_document_types,id",
        ]);
        $employee_document = EmployeeDocument::find($id);
        if ($employee_document == null) {
            return back()->with("error","Unkonwn Employee Document");
        }
        $data = [
            'employee_id' => $request->employee_id,
            'employee_document_type_id' => $request->document_type_id,
        ];
        if($request->hasFile('document'))
        {
            $filenameWithExt = $request->file('document')->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $request->file('document')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $dir             = storage_path('uploads/document/');
            // $image_path      = $dir . $filenameWithExt;

            // if(File::exists($image_path))
            // {
            //     File::delete($image_path);
            // }

            if(!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $path = $request->file('document')->move(public_path('uploads/document/'), $fileNameToStore);
            $data['document_value'] = $fileNameToStore;
            
        }
        $employee_document->update($data);

        return redirect()->route("employee-documents.index")->with("success","operation success");
    }

    public function destroy($id) 
    {
        $employee_document = EmployeeDocument::find($id);
        if ($employee_document == null) {
            return back()->with("error","Unkonwn Employee Document");
        }
        $dir             = storage_path('uploads/document/');
        $image_path      = $dir . $employee_document->document_value;

        if(File::exists($image_path))
        {
            File::delete($image_path);
        }
        $employee_document->delete();

        return redirect()->route("employee-documents.index")->with("success","operation success");
    }

    /**
     * Employee Document Types below
     */

    public function employeeDocumentTypes() 
    {
        $types = EmployeeDocumentType::all(); 
        
        return view("employeeDocumentTypes.index",compact("types"));
    }

    public function employeeDocumentTypeEdit($id) 
    {
        $document_type = EmployeeDocumentType::find($id); 
        
        return view("employeeDocumentTypes.edit",compact("document_type"));
    }
    
    public function employeeDocumentTypeCreate() 
    {    
        return view("employeeDocumentTypes.create");
    }

    public function employeeDocumentTypeStore(Request $request) 
    {    
        $data = $request->validate([
            "name" => "required"
        ]);

        EmployeeDocumentType::create($data)->save();
        return redirect()->route("employee-document-types.index")->with("success","operation success");
    }

    public function employeeDocumentTypeUpdate(Request $request, $id) 
    {    
        $data = $request->validate([
            "name" => "required"
        ]);

        $type = EmployeeDocumentType::find($id);
        if ($type == null) {
            return back()->with("error","Unkonwn Employee Document Type");
        }
        $type->update($data);
        return redirect()->route("employee-document-types.index")->with("success","operation success");
    }

    public function employeeDocumentTypeDestroy($id) 
    {
        $type = EmployeeDocumentType::find($id);
        if ($type == null) {
            return back()->with("error","Unkonwn Employee Document Type");
        }

        $type->delete();
        return redirect()->route("employee-document-types.index")->with("success","operation success");
    }

    
}
