@extends('layouts.admin')
@section('page-title')
    {{__('Manage Employee Contract Template')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Branch')}}</li>
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
        {{-- @can('create template') --}}
            <a href="#" data-url="{{ route('employee.contract.template.create') }}" data-ajax-popup="true" data-title="{{__('Create New Branch')}}" data-bs-toggle="tooltip" title="{{__('Create')}}"  class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        {{-- @endcan --}}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-3">
            @include('layouts.hrm_setup')
        </div>
        <div class="col-12 col-md-9">
            <div class="card">
                <div class="card-body table-border-style">

                    {{ Form::open(array('url' => 'employees/contract/template/store')) }}
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
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    {{ Form::label('description', __('Content'),['class'=>'form-label']) }}
                                    <textarea class="form-control summernote-simple" id="exampleFormControlTextarea2" rows="8"></textarea>
                                    <input type="hidden" name="content" id="content" required>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
                            <input type="submit" id="submit" value="{{__('Create')}}" class="btn  btn-primary">
                        </div>
                        {{Form::close()}}

                        <script>
                            document.getElementById('submit').addEventListener('click',()=>{
                              document.getElementById('content').value= document.getElementsByClassName('note-editable')[0].innerHTML;
                            })
                        </script>
                </div>
            </div>
        </div>
    </div>
@endsection
