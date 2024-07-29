@extends('layouts.admin')

@section('page-title')
    {{__('Dispute Management')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Legal')}}</li>
    <li class="breadcrumb-item">{{__('Disputes')}}</li>
@endsection
@section('action-btn')
    <div class="float-end">
        @can("create dispute")
            <a href="{{ route('disputes.create') }}" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>    
        @endcan
        
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body table-border-style" style="min-height: 65vh; max-height:100vh; overflow-y:scroll">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                        <tr>
                            <th>{{__('Subject')}}</th>
                            <th>{{__('Complain Date')}}</th>
                            <th>{{__('end_date')}}</th>
                            <th>{{__('status')}}</th>
                            @if(Gate::check('edit dispute') || Gate::check('delete dispute'))
                                <th>{{__('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody class="font-style">
                        @foreach ($disputes as $dispute)
                            <tr>
                                <td>{{ $dispute->subject }}</td>
                                <td>{{ $dispute->complain_date }}</td>
                                <td>{{ $dispute->end_date == null? "-": $dispute->end_date }}</td>
                                <td>
                                    @switch($dispute->status)
                                        @case(1)
                                            <span class="badge bg-success">
                                                {{ __("Won") }}
                                            </span>
                                            @break
                                        @case(-1)
                                            <span class="badge bg-danger">
                                                {{ __("Lost") }}
                                            </span>
                                            @break
                                        @case(0)
                                            <span class="badge bg-warning">
                                                {{ __("Pending") }}
                                            </span>
                                            @break
                                        
                                        @default
                                            
                                    @endswitch
                                    
                                </td>
                                {{-- @if(Gate::check('edit dispute') || Gate::check('delete dispute')) --}}
                                    <td>
                                        @can('edit dispute')
                                            <div class="action-btn bg-primary ms-2">
                                                <a href="{{ route('disputes.edit',$dispute->id)}}" class="mx-3 btn btn-sm align-items-center" ><i class="ti ti-pencil text-white"></i></a>
                                            </div>
                                        @endcan
                                        @can('delete dispute')
                                            <div class="action-btn bg-danger ms-2">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['disputes.destroy', $dispute->id],'id'=>'delete-form-'.$dispute->id]) !!}

                                                <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="dispute.getElementById('delete-form-{{$dispute->id}}').submit();"><i class="ti ti-trash text-white"></i></a>
                                                {!! Form::close() !!}
                                            </div>
                                        @endcan
                                        @can('edit dispute')
                                        <div class="action-btn bg-neutral ms-2 dropdown">
                                            <a href="#" class="mx-3 btn btn-sm align-items-center" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-h"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#" data-url="{{ route("disputes.handler.create", $dispute->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Add Handler')}}" data-bs-toggle="tooltip" title="{{__('Create')}}" data-original-title="{{__('Create')}}">Add Handler</a></li>
                                                <li><a class="dropdown-item" href="#" data-url="{{ route("disputes.procedure.create", $dispute->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Add Procedure')}}" data-bs-toggle="tooltip" title="{{__('Create')}}" data-original-title="{{__('Create')}}">Add Procedure</a></li>
                                                <li><a class="dropdown-item" href="#" data-url="{{ route("disputes.resource.create", $dispute->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Add Resource')}}" data-bs-toggle="tooltip" title="{{__('Create')}}" data-original-title="{{__('Create')}}">Add Resource</a></li>
                                                <li><a class="dropdown-item" href="#" data-url="{{ route("disputes.consultants.create", $dispute->id) }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Add Consultant')}}" data-bs-toggle="tooltip" title="{{__('Create')}}" data-original-title="{{__('Create')}}">Add Consultant</a></li>
                                            </ul>
                                        </div>
                                        @endcan
                                    </td>
                                {{-- @endif --}}
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
