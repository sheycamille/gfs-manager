@extends('layouts.admin')
@section('page-title')
    {{__('Manage Employee Contract Template')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Employee Contract Templates')}}</li>
@endsection

@section('action-btn')
    <div class="float-end">
        {{-- @can('create template') --}}
            <a href="{{ route('employee.contract.template.create') }}" class="btn btn-primary btn-sm">
                <i class="ti ti-plus"></i>
            </a>
        {{-- @endcan --}}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col btn-sm-12 col-md-3">
            @include('layouts.hrm_setup')
        </div>
        <div class="col-12 col-md-9">
            <div class="card">
                <div class="card-body table-border-style">

                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th width="200px">{{__('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            @foreach ($templates as $template)
                                <tr>
                                    <td>{{ $template->name }}</td>
                                    <td class="Action text-end">
                                        <span>
                                            {{-- @can('edit template') --}}
                                                <div class="action-btn bg-primary ms-2">

                                                    <a href="{{ route("employee.contract.template.edit", $template->id) }}" class="btn-sm align-items-center"><i class="ti ti-pencil text-white"></i></a>
                                                </div>
                                            {{-- @endcan --}}
                                            {{-- @can('delete template') --}}
                                                <div class="action-btn bg-danger ms-2">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['employee.contract.template.destroy', $template->id],'id'=>'delete-form-'.$template->id]) !!}

                                                    <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$template->id}}').submit();"><i class="ti ti-trash text-white text-white"></i></a>
                                                    {!! Form::close() !!}
                                                </div>
                                            {{-- @endcan --}}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
