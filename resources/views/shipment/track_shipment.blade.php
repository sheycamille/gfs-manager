@extends('layouts.admin')
@section('page-title')
    {{ __('Track Shipment') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Track Shipment') }}</li>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 col-lg-5">
            <div class="card p-4">

                <form action="" >
                    @csrf
                    <div class="d-flex ">
                        <input type="text" class="form-control" name="tracking_no" placeholder="Enter Your Tracking No" />
                        <button type="submit" class="btn btn-primary">{{__('Track') }}</button>
                    </div>

                </form>

            </div>
        </div>
        @if ($shipment != null)
        <div class="col-md-12">
            <div  class="text-center ">
                <div class="comp_logo">
                    <img decoding="async" src="{{ URL::TO('assets/images/GFS_Logo.png') }}"
                        style="margin: 0 auto;">
                </div><!-- comp_logo -->
                <div class="b_code">
                    <img decoding="async"
                        src="data:image/png;base64,{{ \DNS1D::getBarcodePNG($shipment->tracking_no, 'C39+',3,33) }}"
                        alt="#009314453746" style="margin: 0 auto;">
                </div><!-- b_code -->
                <div class="shipment-number">
                    <span style="display: block; font-size: 18px!important;"> {{ $shipment->tracking_no }} </span>
                </div><!-- Track_Num -->
            </div>
            <div id="shipper-info" class="row justify-content-evenly mt-5">
                <div class="col-md-5 detail-section">
                    <p id="shipper-header" class="header-title"><strong>{{__('Shipper Information') }}</strong></p>
                    <p class="shipper details">{{ $shipment->shipper_name ?? '' }}<br>
                        {{ $shipment->shipper_address ?? ''}}<br>
                        {{ $shipment->shipper_phone ?? ''}}<br>
                        {{ $shipment->shipper_email?? '' }}<br></p>
                </div>
                <div class="col-md-5 detail-section">
                    <p id="receiver-header" class="header-title"><strong>{{__('Receiver Information') }}</strong></p>
                    <p class="receiver details">{{ $shipment->receiver_name ?? ''}}<br>
                        {{ $shipment->receiver_address ?? '' }}<br>
                        {{ $shipment->receiver_phone ?? '' }}<br>
                        {{ $shipment->receiver_email ?? '' }}<br></p>
                </div>
                <div class="clear-line"></div>
            </div>
            <div id="shipment-status" class="card p-2 mt-4 bg-primary" style="text-align:center;">
                <p class="font-style text-white fs-4">{{__('Shipment Status') }}: {{ $shipment->package_status ?? '' }}</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="fs-4"><strong>{{__('Shipment Information') }}</strong></p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Origin') }}:</p>
                    <p>{{ $shipment->origin_field ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Package') }}:</p>
                    <p>{{ $shipment->packages ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Status') }}:</p>
                    <p><span class="on_hold">{{ $shipment->package_status ?? '' }}</span></p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Destination') }}:</p>
                    <p>{{ $shipment->package_status ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Carrier') }}:</p>
                    <p>{{ $shipment->carrier ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Type of Shipment') }}:</p>
                    <p>{{ $shipment->type_of_shipment ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Weight') }}:</p>
                    <p>{{ $shipment->weight ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Shipment Mode') }}:</p>
                    <p>{{ $shipment->mode_field ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Carrier Reference No') }}.:</p>
                    <p>{{ $shipment->carrier_ref_number ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Product') }}:</p>
                    <p>{{ $shipment->product ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Qty') }}:</p>
                    <p>{{ $shipment->qty ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Payment Mode') }}:</p>
                    <p>{{ $shipment->payment_method ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{_('Total Freight') }}:</p>
                    <p >{{ $shipment->total_freight ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Expected Delivery Date') }}:</p>
                    <p class="">{{ $shipment->delivery_date ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Departure Time') }}:</p>
                    <p>{{ $shipment->departure_time ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Pickup Date') }}:</p>
                    <p>{{ $shipment->pickup_date ?? '' }}</p>
                </div>
                <div class="col-md-4">
                    <p class="fw-bold">{{__('Pickup Time') }}:</p>
                    <p>{{ $shipment->pickup_time ?? '' }}</p>
                </div>
                <div class="col-md-12">
                    <p class="fw-bold">{{__('Comments') }}: </p>
                    <p>{{ $shipment->comments ?? '' }}</p>
                </div>
            </div>
        

    </div>
    @endif
      
        
    </div>
@endsection
