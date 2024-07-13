@extends('layouts.admin')
@section('page-title')
    {{__('Manage Contract')}}
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/dragula.min.css') }}" id="main-style-link">
@endpush
@push('script-page')
    {{-- <script src="{{ asset('libs/dragula/dist/dragula.min.js') }}"></script>
    <script src="{{ asset('libs/autosize/dist/autosize.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/plugins/dragula.min.js') }}"></script>
@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Dispute Management')}}</li>
    <li class="breadcrumb-item">{{__('Edit')}}</li>
@endsection
@push('css-page')
    <link rel="stylesheet" href="{{asset('css/summernote/summernote-bs4.css')}}">
    <link href="{{asset('css/bootstrap-tagsinput.css')}}" rel="stylesheet"/>

@endpush
@push('script-page')

    <script src="{{asset('js/bootstrap-tagsinput.min.js')}}"></script>
    <script>
        var e = $('[data-toggle="tags"]');
        e.length && e.each(function () {
            $(this).tagsinput({tagClass: "badge badge-primary"})
        });
    </script>
    <script src="{{asset('css/summernote/summernote-bs4.js')}}"></script>
@endpush
@section('action-btn')
    <div class="float-end">
        @if(\Auth::user()->type == 'company')
            <a href="{{ route('disputes.create') }}" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        @endif
    </div>
@endsection

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-xl-11 mx-auto">
            <form action="{{ route('disputes.update',$dispute->id) }}" method="post" enctype="multipart/form-data">
                {{-- main form --}}
                <div class="card">
                    <div class="card-body table-border-style">
                        @csrf
                        <div class="modal-body">
                            {{-- start for ai module--}}
                            @php
                                $settings = \App\Models\Utility::settings();
                            @endphp
                            @if($settings['ai_chatgpt_enable'] == 'on')
                                <div class="text-end">
                                    <a href="#" data-size="md" class="btn  btn-primary btn-icon btn-sm" data-ajax-popup-over="true" data-url="{{ route('generate',['contract']) }}"
                                    data-bs-placement="top" data-title="{{ __('Generate content with AI') }}">
                                        <i class="fas fa-robot"></i> <span>{{__('Generate with AI')}}</span>
                                    </a>
                                </div>
                            @endif
                            {{-- end for ai module--}}
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="employee_id" class="form-label">Subject <code>*</code></label>
                                    <input type="text" class="form-control" name="subject" value="{{$dispute->subject}}" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="employee_id" class="form-label">Desired Outcome <code>*</code></label>
                                    <input type="text" class="form-control" name="desired_outcome" value="{{$dispute->desired_outcome}}" required>
                                </div>
                                <div class="col-md-12">
                                    <hr> 
                                    <p class="text-center my-3">
                                        {{ __("Parties involved") }}
                                    </p>
                                    <hr> 
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="employee_id" class="form-label">Employees</label>
                                    <select name="employees[]" id="employees" class="form-control select2" multiple>
                                        @foreach($employees as $employee)
                                            <option 
                                            value="{{ $employee->id }}"
                                            @foreach ($dispute->partiesInvolved as $pi)
                                                {{ $pi->employee_id == $employee->id?"selected":"" }}
                                            @endforeach
                                            >{{ $employee->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="customers" class="form-label">Customers</label>
                                    <select name="customers[]" id="customers" class="form-control select2" multiple>
                                        @foreach($customers as $customer)
                                            <option 
                                            value="{{ $customer->id }}"
                                            @foreach ($dispute->partiesInvolved as $pi)
                                                {{ $pi->customer_id == $customer->id?"selected":"" }}
                                            @endforeach
                                            >{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="contractType" class="form-label">
                                        Complain Date <code>*</code>
                                    </label>
                                    <input type="date" name="complain_date" value="{{$dispute->complain_date}}" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contractType" class="form-label d-flex justify-content-between">
                                        End Date
                                    </label>
                                    <input type="date" name="end_date" value="{{$dispute->end_date}}" class="form-control">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Legal Basis <code>*</code></label>
                                    <textarea id="legal_basis" class="form-control summernote-simple-2" cols="30" rows="3"> {{ $dispute->legal_basis }} </textarea>
                                    <input name="legal_basis" id="legal_basis_hidden" type="hidden">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Conclusion</label>
                                    <textarea id="conclusion" class="form-control summernote-simple-2" cols="30" rows="3"> {{ $dispute->conclusion }} </textarea>
                                    <input name="conclusion" id="conclusion_hidden" type="hidden">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option disabled selected>--Select Status</option>
                                        <option value="1" {{ $dispute->status ==1 ?"selected":"" }}>Won</option>
                                        <option value="0" {{ $dispute->status ==0 ?"selected":"" }}>Pending/Ongoing</option>
                                        <option value="-1" {{ $dispute->status ==-1 ?"selected":"" }}>Lost</option>
                                    </select>
                                </div>
                        </div>
                        </div>
                        
                    </div>
                </div>
                {{-- end main form --}}
                <div class="row">
                    {{-- handlers --}}
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-title d-flex justify-content-between px-4 pt-4">
                                <span>
                                    Dispute Handlers
                                </span>
                                <button class="btn btn-primary btn-sm" type="button" onclick="addHandler()">
                                    <i class="ti ti-plus"></i>
                                </button>
                            </div>
                            <div class="card-body" id="handler-container" style="max-height: 40vh; overflow-y: scroll">
                                @foreach ($dispute->handlers as $handler)
                                    <div id="handler-wrapper-{{ $loop->index }}">
                                        <hr>
                                        <div class="text-end">
                                            <button class="btn btn-danger btn-sm" type="button" id="handler-delete-{{ $loop->index }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Employee</label>
                                                <select name="handlers[{{ $loop->index }}][employee_id]" class="form-control" id="handler-employees-{{ $loop->index }}" required>
                                                    @foreach ($employees as $employee)
                                                    <option 
                                                    value="{{ $employee->id }}"
                                                    {{ $handler->employee_id == $employee->id?"selected":"" }}
                                                    >{{ $employee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-check-label mx-2" for="">Start Date</label>
                                                    <input name="handlers[{{ $loop->index }}][start_date]" value="{{ $handler->start_date }}" class="form-control" type="date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-check-label mx-2" for="">End Date</label>
                                                    <input name="handlers[{{ $loop->index }}][end_date]" value="{{ $handler->end_date }}" class="form-control" type="date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- resources --}}
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-title d-flex justify-content-between px-4 pt-4">
                                <span>
                                    Dispute Resources/Documents
                                </span>
                                <button class="btn btn-primary btn-sm" type="button" onclick="addResource()">
                                    <i class="ti ti-plus"></i>
                                </button>
                            </div>
                            <div class="card-body" id="resources-container" style="max-height: 40vh; overflow-y: scroll">
                                @foreach ($dispute->resources as $resource)
                                    <div id="resources-wrapper-{{ $loop->index }}">
                                        <hr>
                                        <div class="text-end">
                                            <button class="btn btn-danger btn-sm" id="resources-delete-{{ $loop->index }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Name</label>
                                                <input type="text" name="resources[{{ $loop->index }}][name]" value="{{ $resource->name }}" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-check-label mx-2" for="">File</label>
                                                    <div class="input-group mb-3">
                                                        <input name="resources[{{ $loop->index }}][file]" class="form-control" type="file">
                                                        <span class="input-group-text" title="download previous file" id="basic-addon2">
                                                            <a href="{{ url("/")."/".$resource->file_url }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-download"></i></a>
                                                        </span>
                                                    </div>
                                                    <input name="resources[{{ $loop->index }}][prev_file]" value="{{ $resource->file_url }}" class="form-control" type="hidden">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-check-label mx-2" for="">Description</label>
                                                    <textarea name="resources[{{ $loop->index }}][description]" class="form-control" cols="30" rows="5">{{ $resource->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- procedures --}}
                    <div class="col-md-6 mt-2">
                        <div class="card">
                            <div class="card-title d-flex justify-content-between px-4 pt-4">
                                <span>
                                    Dispute Procedures
                                </span>
                                <button class="btn btn-primary btn-sm" type="button" onclick="addProcedure()">
                                    <i class="ti ti-plus"></i>
                                </button>
                            </div>
                            <div class="card-body" id="procedures-container" style="max-height: 40vh; overflow-y: scroll">
                                @foreach ($dispute->procedures as $procedure)
                                    <div id="procedures-wrapper-{{ $loop->index }}">
                                        <hr>
                                        <div class="text-end">
                                            <button class="btn btn-danger btn-sm" id="procedures-delete-{{$loop->index}}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Name</label>
                                                <input type="text" name="procedures[{{$loop->index}}][name]" value="{{ $procedure->name }}" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-check-label mx-2" for="">Procedure Date</label>
                                                    <input name="procedures[{{$loop->index}}][procedure_date]" value="{{ $procedure->procedure_date }}" class="form-control" type="date" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-check-label mx-2" for="">Description</label>
                                                    <textarea name="procedures[{{$loop->index}}][description]" value="{{ $procedure->description }}" class="form-control" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- consultants --}}
                    <div class="col-md-6 mt-2">
                        <div class="card">
                            <div class="card-title d-flex justify-content-between px-4 pt-4">
                                <span>
                                    Consultants/ External Help
                                </span>
                                <button class="btn btn-primary btn-sm" type="button" onclick="addConsultant()">
                                    <i class="ti ti-plus"></i>
                                </button>
                            </div>
                            <div class="card-body" id="consultants-container" style="max-height: 40vh; overflow-y: scroll">
                                @foreach ($dispute->consultants as $consultant)
                                    <div id="consultants-wrapper-{{ $loop->index }}">
                                        <hr>
                                        <div class="text-end">
                                            <button class="btn btn-danger btn-sm" id="consultants-delete-{{$loop->index}}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Name</label>
                                                <input type="text" name="consultants[{{$loop->index}}][name]" value="{{ $consultant->name }}" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Job Title</label>
                                                <input type="text" name="consultants[{{$loop->index}}][job_title]" value="{{ $consultant->job_title }}" class="form-control" required>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-check-label mx-2" for="">Start Date</label>
                                                    <input name="consultants[{{$loop->index}}][start_date]" value="{{ $consultant->start_date }}" class="form-control" type="date" >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-check-label mx-2" for="">End Date</label>
                                                    <input name="consultants[{{$loop->index}}][end_date]" value="{{ $consultant->end_date }}" class="form-control" type="date" >
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-check-label mx-2" for="">Job Description</label>
                                                    <textarea name="consultants[{{$loop->index}}][description]" class="form-control" cols="30" rows="5">{{ $consultant->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <div class="text-center mb-3">
                    <button class="btn btn-primary" type="submit" id="submit">
                        {{ __("Update") }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('assets/js/plugins/choices.min.js')}}"></script>
    <script>

        var handlers = parseInt("{{ sizeof($dispute->handlers) }}");
        for (let index = 0; index < handlers; index++) {
            document.getElementById("handler-delete-"+ index).addEventListener("click", (e)=> {
                document.getElementById("handler-wrapper-"+ index).remove();
            });
            
        }
        var resources = parseInt("{{ sizeof($dispute->resources) }}");
        for (let index = 0; index < resources; index++) {
            document.getElementById("resources-delete-"+ index).addEventListener("click", (e)=> {
                document.getElementById("resources-wrapper-"+ index).remove();
            });
            
        }
        var procedures = parseInt("{{ sizeof($dispute->procedures) }}");
        for (let index = 0; index < procedures; index++) {
            document.getElementById("procedures-delete-"+ index).addEventListener("click", (e)=> {
                document.getElementById("procedures-wrapper-"+ index).remove();
            });
            
        }

        var consultants = parseInt("{{ sizeof($dispute->consultants) }}");
        for (let index = 0; index < consultants; index++) {
            document.getElementById("consultants-delete-"+ index).addEventListener("click", (e)=> {
                document.getElementById("consultants-wrapper-"+ index).remove();
            });
            
        }
        let employees = "{{ json_encode($employees) }}";
        employees = employees.replaceAll("&quot;","\"")
        employees = JSON.parse(employees);
        
        function addHandler() {
            
            const wrapper = document.createElement("div");

            wrapper.innerHTML = `
                <hr>
                <div class="text-end">
                    <button class="btn btn-danger btn-sm" type="button" id="handler-delete-${handlers}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Employee</label>
                        <select name="handlers[${handlers}][employee_id]" class="form-control" id="handler-employees-${handlers}" required>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-check-label mx-2" for="">Start Date</label>
                            <input name="handlers[${handlers}][start_date]" class="form-control" type="date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-check-label mx-2" for="">End Date</label>
                            <input name="handlers[${handlers}][end_date]" class="form-control" type="date">
                        </div>
                    </div>
                </div>
            `;


            document.getElementById("handler-container").prepend(wrapper);
            employees.forEach(employee => {
                const option = document.createElement("option");
                option.setAttribute("value", employee.id);
                option.textContent = employee.name;
                document.getElementById("handler-employees-" + handlers).appendChild(option);
            });
            document.getElementById("handler-delete-"+ handlers).addEventListener("click", (e)=> {
                wrapper.remove();
            });
            handlers += 1;

            return;
        }

        function addResource() {
            const wrapper = document.createElement("div");
            wrapper.innerHTML = `
                <hr>
                <div class="text-end">
                    <button class="btn btn-danger btn-sm" id="resources-delete-${resources}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Name</label>
                        <input type="text" name="resources[${resources}][name]" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-check-label mx-2" for="">File</label>
                            <input name="resources[${resources}][file]" class="form-control" type="file">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-check-label mx-2" for="">Description</label>
                            <textarea name="resources[${resources}][description]" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>

            `;
            document.getElementById("resources-container").prepend(wrapper);
            document.getElementById("resources-delete-"+ resources).addEventListener("click", (e)=> {
                wrapper.remove();
            });
            resources += 1;

            return;
        }
        
        function addProcedure() {
            const wrapper = document.createElement("div");
            wrapper.innerHTML = `
                <hr>
                <div class="text-end">
                    <button class="btn btn-danger btn-sm" id="procedures-delete-${procedures}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Name</label>
                        <input type="text" name="procedures[${procedures}][name]" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-check-label mx-2" for="">Procedure Date</label>
                            <input name="procedures[${procedures}][procedure_date]" class="form-control" type="date" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-check-label mx-2" for="">Description</label>
                            <textarea name="procedures[${procedures}][description]" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            `;
            document.getElementById("procedures-container").prepend(wrapper);
            document.getElementById("procedures-delete-"+ procedures).addEventListener("click", (e)=> {
                wrapper.remove();
            });
            procedures += 1;

            return; 
        }

        function addConsultant() {
            const wrapper = document.createElement("div");
            wrapper.innerHTML = `
                <hr>
                <div class="text-end">
                    <button class="btn btn-danger btn-sm" id="consultants-delete-${consultants}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Name</label>
                        <input type="text" name="consultants[${consultants}][name]" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Job Title</label>
                        <input type="text" name="consultants[${consultants}][job_title]" class="form-control" required>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-check-label mx-2" for="">Start Date</label>
                            <input name="consultants[${consultants}][start_date]" class="form-control" type="date" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-check-label mx-2" for="">End Date</label>
                            <input name="consultants[${consultants}][end_date]" class="form-control" type="date" >
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-check-label mx-2" for="">Job Description</label>
                            <textarea name="consultants[${consultants}][description]" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            `;
            document.getElementById("consultants-container").prepend(wrapper);
            document.getElementById("consultants-delete-"+ consultants).addEventListener("click", (e)=> {
                wrapper.remove();
            });
            consultants += 1;

            return; 
        }
        
        document.getElementById('submit').addEventListener('click',()=>{
            document.getElementById('legal_basis_hidden').value= document.getElementsByClassName('note-editable')[0].innerHTML;
            document.getElementById('conclusion_hidden').value= document.getElementsByClassName('note-editable')[1].innerHTML;
        });
    </script>
@endsection





