@extends('layouts.admin')
@section('page-title')
    {{__('All Shipment')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Shipments')}}</li>
@endsection

@section('action-btn')
    <div class="float-end">
       @can("create shipment")
       <a href="{{ route('shipment.create') }}"
           class="btn btn-sm btn-primary">
           <i class="ti ti-plus"></i>
       </a>
       @endcan
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="mt-2 " id="multiCollapseExample1">
            <div class="card">
                <div class="card-body">
                    <h2>{{ __("Filters") }}</h2>
                    <p class="text-muted">{{ __("filter through your shipments")  }}</p>
                  <form method="GET" action="{{ route('shipment.all.show') }}" accept-charset="UTF-8" id="shipment">
                    <div class="row align-items-center justify-content-end">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="btn-box">
                                        <label for="account" class="form-label">{{__('By Status') }}</label>
                                        <select class="form-control select" id="account" name="status">
                                            <option value="" selected="selected">{{__('Select Status') }}</option>
                                            <option value="Pending">{{__('Pending') }}</option>
                                            <option value="Picked up">{{__('Picked up') }}</option>
                                            <option value="On Hold">{{__('On Hold') }}</option>
                                            <option value="Out for delivery">{{__('Out for delivery') }}</option>
                                            <option value="In Transit">{{__('In Transit') }}</option>
                                            <option value="Enroute">{{__('Enroute') }}</option>
                                            <option value="Cancelled">{{__('Cancelled') }}</option>
                                            <option value="Delivered">{{__('Delivered') }}</option>
                                            <option value="Returned">{{__('Returned') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="btn-box">
                                        <label for="account" class="form-label">{{__('By Shipper') }}</label>
                                        <select class="form-control select" id="account" name="shipper_name">
                                            <option value="" selected="selected">{{__('All') }}</option>
                                            @foreach($shipper_names as $shipper_name)
                                            <option value="{{ $shipper_name }}">{{ $shipper_name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="btn-box">
                                        <label for="type" class="form-label">{{__('By Receiver') }}</label>
                                        <select class="form-control select" id="type" name="receiver_name">
                                            <option selected="selected" value="">{{__('All') }}</option>
                                            @foreach($receiver_names as $receiver_name)
                                            <option value="{{ $receiver_name }}">{{ $receiver_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 d-flex justify-content-center align-items-end">
                                    <a href="#" class="btn btn-primary mx-3" onclick="document.getElementById('shipment').submit(); return false;" data-bs-toggle="tooltip" title="" data-original-title="apply" data-bs-original-title="Apply">
                                        {{ __("Filter") }}
                                    </a>

                                    <a href="#" class="btn btn-light border border-2" data-bs-toggle="tooltip" title="" data-original-title="Reset" data-bs-original-title="Reset">
                                        {{ __("Reset") }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                  </form>
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="d-flex justify-content-between">
                    <h2>{{ __("Shipments") }}</h2>
                    <p>
                        Total: {{ sizeof($shipments) }}
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>{{__('Tracking Number')}}</th>
                                <th>{{__('Shipment Mode')}}</th>
                                <th>{{__('Shipper Name')}}</th>
                                <th>{{__('Receiver Name') }}</th>
                                <th>{{__('Date') }}</th>
                                <th>{{__('Status') }}</th>
                                <th width="200px">{{__('Action')}}</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shipments as $shipment)
                                <tr>
                                    <td class="Id">
                                        {{ $shipment->tracking_no }}
                                    </td>
                                    <td class="font-style">{{ $shipment->mode_field }}</td>
                                    <td class="font-style">{{ $shipment->shipper_name }}</td>
                                    <td class="font-style">{{ $shipment->receiver_name }}</td>
                                    <td class="font-style">{{ $shipment->status_date }}</td>
                                    <td class="font-style">{{ $shipment->package_status }}</td>
                                    
                                    <td>
                                        @can("edit shipment")
                                            <div class="action-btn bg-primary ms-2">
                                                <a href="{{route('shipment.edit',\Illuminate\Support\Facades\Crypt::encrypt($shipment->id))}}" class="mx-3 btn btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Edit')}}"
                                                data-original-title="{{__('Edit')}}"><i class="ti ti-pencil text-white"></i></a>
                                            </div>    
                                        @endcan
                                        @can("delete shipment")
                                            <div class="action-btn bg-danger ms-2">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['shipment.destroy', $shipment->id],'id'=>'delete-form-'.$shipment->id]) !!}

                                                <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$shipment->id}}').submit();"><i class="ti ti-trash text-white"></i></a>
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
