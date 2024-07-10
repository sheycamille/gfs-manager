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
    <li class="breadcrumb-item">{{__('Employee Contract')}}</li>
    <li class="breadcrumb-item">{{__('Create')}}</li>
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
            <a href="{{ route('employees.contract.create') }}" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        @endif
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-10 mx-auto">
            <div class="card">
                <div class="card-body table-border-style">
                    <form action="{{ url('employees/contract/store') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="employee_id" class="form-label">Employee</label>
                                    <select name="employee_id" id="employee_id" class="form-control select2">
                                        <option disabled selected>--Select Employee</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="contractType" class="form-label d-flex justify-content-between">
                                        <span>
                                            Contract Type
                                        </span>
                                        <a href="{{ route("contractType.create") }}" class="btn btn-primary btn-sm">
                                            <i class="ti ti-plus"></i>
                                        </a>
                                    </label>
                                    <select name="contract_type_id" id="contractType" class="form-control">
                                        <option disabled selected>--Select Contract Type</option>
                                        @foreach($contractTypes as $contract_type)
                                            <option value="{{ $contract_type->id }}">{{ $contract_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6 d-flex align-items-center justify-content-center">
                                    <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Select Template</label>
                                    <div class="form-check form-switch mx-2">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Upload File</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option disabled selected>--Select Status</option>
                                        <option value="accept">Accepted</option>
                                        <option value="pending">Pending</option>
                                        <option value="suspended">Suspended</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <div id="template-container">
                                        <label for="template_id" class="form-label d-flex justify-content-between">
                                            <span>
                                                Contract Template
                                            </span>
                                            <a href="{{ route("employee.contract.template.create") }}" class="btn btn-primary btn-sm">
                                                <i class="ti ti-plus"></i>
                                            </a>
                                        </label>
                                        <select name="template_id" id="template_id" class="form-control">
                                            <option disabled selected>--Select Contract Template</option>
                                            @foreach($templates as $template)
                                                <option 
                                                    value="{{ $template->id }}" 
                                                    >{{ $template->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div id="file-container" class="d-none">
                                        <label for="file" class="form-label">Upload Contract</label>
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                    
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('value', __('Contract Value'),['class'=>'form-label']) }}
                                    {{ Form::number('contract_value', '', array('class' => 'form-control','required'=>'required','stage'=>'0.01')) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('start_date', __('Start Date'),['class'=>'form-label']) }}
                                    {{ Form::date('start_date', '', array('class' => 'form-control','required'=>'required')) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('end_date', __('End Date'),['class'=>'form-label']) }}
                                    {{ Form::date('end_date', '', array('class' => 'form-control','required'=>'required')) }}
                                </div>
                            </div>
                            <div class="row" id="description-container">
                                <div class="form-group col-md-12">
                                    {{ Form::label('description', __('Description'),['class'=>'form-label']) }}
                                    <textarea name="description" id="description" class="form-control summernote-simple-2" cols="30" rows="3"> </textarea>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer p-3">
                            <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
                            <input type="submit" id="submit" value="{{__('Create')}}" class="btn  btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/plugins/choices.min.js')}}"></script>
    <script>
        if ($(".multi-select").length > 0) {
            $( $(".multi-select") ).each(function( index,element ) {
                var id = $(element).attr('id');
                var multipleCancelButton = new Choices(
                    '#'+id, {
                        removeItemButton: true,
                    }
                );
            });
        }
    </script>
    <script>
        document.getElementById("flexSwitchCheckDefault").addEventListener("change", (e) => {
            if(e.target.checked) {
                document.getElementById("template-container").classList.add("d-none");
                document.getElementById("description-container").classList.add("d-none");
                document.getElementById("file-container").classList.remove("d-none");
            } else {
                document.getElementById("template-container").classList.remove("d-none");
                document.getElementById("description-container").classList.remove("d-none");
                document.getElementById("file-container").classList.add("d-none");
                

            }
        });
        document.getElementById("template_id").addEventListener("change", (e) => {
            populateDescription(e.target.value)
        });
        
        let templates = "{{ json_encode($templates) }}";
        templates = templates.replaceAll("&quot;","\"")
        templates = JSON.parse(templates);
        function populateDescription(id) {
            templates.forEach(template => {
                if (template.id == id) {
                    document.getElementById("description").innerHTML = template.content;
                    document.getElementsByClassName('note-editable')[0].innerHTML = template.content
                }
            });
        }
        document.getElementById('submit').addEventListener('click',()=>{
            document.getElementById('description').value= document.getElementsByClassName('note-editable')[0].innerHTML;
        });
    </script>
@endsection





