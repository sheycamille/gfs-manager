@extends('layouts.admin')
@section('page-title')
    {{__('Manage Contract')}}
@endsection
@push('script-page')
@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Employee Contract')}}</li>
@endsection
@section('action-btn')
    <div class="float-end">
        @can("create contract")
            <a href="{{ route('employees.contract.create') }}" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        @endcan

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th scope="col">{{__('#')}}</th>
                                <th scope="col">{{__('Employee')}}</th>
                                <th scope="col">{{__('Contract Type')}}</th>
                                <th scope="col">{{__('Contract Value')}}</th>
                                <th scope="col">{{__('Start Date')}}</th>
                                <th scope="col">{{__('End Date')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th scope="col" >{{__('Action')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            
                                @foreach ($contracts as $contract)
                                    <tr class="font-style">
                                        <td>
                                            <a href="{{route('contract.show',$contract->id)}}" class="btn btn-outline-primary">{{\Auth::user()->contractNumberFormat($contract->id)}}</a>
                                        </td>
                                        <td>{{ $contract->employee->name}}</td>
                                        <td>{{ $contract->contractType->name}}</td>
                                        <td>{{ \Auth::user()->priceFormat($contract->contract_value) }}</td>
                                        <td>{{  \Auth::user()->dateFormat($contract->start_date )}}</td>
                                        <td>{{  \Auth::user()->dateFormat($contract->end_date )}}</td>
                                        <td>
                                            @switch($contract->status)
                                                @case("accept")
                                                    <span class="badge bg-success">
                                                    @break
                                                @case("suspended")
                                                    <span class="badge bg-danger">
                                                    @break
                                                @case("pending")
                                                    <span class="badge bg-warning">
                                                    @break
                                                
                                                @default
                                                    
                                            @endswitch
                                                {{$contract->status}}
                                            </span>
                                        </td>

                                        <td class="action ">
                                            @if(\Auth::user()->type=='company')
                                                @if($contract->status=='accept')
                                                    <div class="action-btn bg-primary ms-2">
                                                        <a href="{{ url('/employees/contract/'.$contract->id.'/edit?type=duplicate') }}"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        ><i
                                                                class="ti ti-copy text-white"></i>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endif
                                            @if($contract->file != null)
                                                <div class="action-btn bg-primary ms-2">
                                                    <a class="mx-3 btn btn-sm align-items-center"
                                                    href="{{ $contract->file }}" download>
                                                        <i class="ti ti-download text-white"></i>
                                                    </a>
                                                </div>
                                            @endif
                                            {{-- @can('show contract')
                                                <div class="action-btn bg-warning ms-2">
                                                    <a href="{{ route('employees.contract.show',$contract->id) }}"
                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                    data-bs-whatever="{{__('View Budget Planner')}}" data-bs-toggle="tooltip"
                                                    data-bs-original-title="{{__('View')}}"> <span class="text-white"> <i class="ti ti-eye"></i></span></a>
                                                </div>
                                            @endcan --}}
                                            @can('edit contract')
                                                <div class="action-btn bg-info ms-2">
                                                    <a href="{{ route('employees.contract.edit',$contract->id) }}" class="mx-3 btn btn-sm d-inline-flex align-items-center">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a></div>
                                            @endcan
                                            @can('delete contract')
                                                <div class="action-btn bg-danger ms-2">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['employees.contract.destroy', $contract->id]]) !!}
                                                    <a href="#" class="mx-3 btn btn-sm  align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}"><i class="ti ti-trash text-white"></i></a>
                                                    {!! Form::close() !!}
                                                </div>
                                            @endcan
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
