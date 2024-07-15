@if(isset($shipment) && $shipment != null)
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-10">
            <div  class="text-center ">
                <div class="comp_logo my-3">
                    <img decoding="async" src="{{ URL::TO('assets/images/GFS_Logo.png') }}" style="margin: 0 auto;" width="250px" height="70px">
                </div><!-- comp_logo -->
                <div class="b_code">
                    <img decoding="async"
                        src="data:image/png;base64,{{ \DNS1D::getBarcodePNG($shipment->id, 'C39+') }}"
                        alt="#009314453746" style="margin: 0 auto;">
                </div><!-- b_code -->
                <div class="shipment-number my-3">
                    <span style="display: block; font-size: 18px!important;"> {{ $shipment->tracking_no }} </span>
                </div><!-- Track_Num -->
            </div>
            <div class="container">
                <div id="shipper-info" class="row justify-content-between">
                    <div class="col-sm-10 col-md-5 detail-section card mx-auto">
                        <div class="card-body">
                            <p id="shipper-header" class="header-title"><strong>{{__('Shipper Information') }}</strong></p>
                            <p class="my-1"><b>Name</b>: {{ $shipment->shipper_name ?? '' }}</p>
                            <p class="my-1"><b>Location</b>: {{ $shipment->shipper_address ?? ''}}</p>
                            <p class="my-1"><b>Number</b>: {{ $shipment->shipper_phone ?? ''}}</p>
                            <p class="my-1"><b>email</b>: {{ $shipment->shipper_email ?? ''}}</p>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-5 detail-section card mx-auto">
                        <div class="card-body">
                            <p id="receiver-header" class="header-title"><strong>{{__('Receiver Information') }}</strong></p>
                            <p class="my-1"><b>Name</b>: {{ $shipment->receiver_name ?? '' }}</p>
                            <p class="my-1"><b>Location</b>: {{ $shipment->receiver_address ?? ''}}</p>
                            <p class="my-1"><b>Number</b>: {{ $shipment->receiver_phone ?? ''}}</p>
                            <p class="my-1"><b>email</b>: {{ $shipment->receiver_email ?? ''}}</p>
                        </div>
                    </div>
                    <div class="clear-line"></div>
                </div>
            </div>
            <div class="card p-2 mt-4 bg-primary d-flex align-items-center justify-content-center" >
                <p class="font-style text-white fs-4">{{__('Shipment Status') }}: {{ $shipment->package_status ?? '' }}</p>
            </div>
            <div class="text-center mb-3">
                <h2 >{{__('Shipment Information') }}</h2>
            </div>
            <div class="card card-body border">
                <div class="row my-2">
                    <div class="col-md-4">
                        <p class="my-1 fw-bold">{{__('Origin') }}:</p>
                        <p class="my-1 text-muted">{{ $shipment->origin_field ?? '' }}</p>
                    </div>
                    <div class="col-md-4 border-start border-end border-2">
                        <p class="my-1 fw-bold">{{__('Package') }}:</p>
                        <p class="my-1 text-muted">{{ $shipment->packages ?? '' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="my-1 fw-bold">{{__('Status') }}:</p>
                        <p class="my-1 text-muted"><span class="on_hold">{{ $shipment->package_status ?? '' }}</span></p>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4">
                        <p class="my-1 fw-bold">{{__('Destination') }}:</p>
                        <p class="my-1 text-muted">{{ $shipment->package_status ?? '' }}</p>
                    </div>
                    <div class="col-md-4 border-start border-end border-2">
                        <p class="my-1 fw-bold">{{__('Carrier') }}:</p>
                        <p class="my-1 text-muted">{{ $shipment->carrier ?? 'UnIdentified' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="my-1 fw-bold">{{__('Type of Shipment') }}:</p>
                        <p class="my-1 text-muted">{{ $shipment->type_of_shipment ?? '' }}</p>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4">
                        <p class="my-1 fw-bold">{{__('Weight') }}:</p>
                        <p class="my-1 text-muted">{{ $shipment->weight ?? '' }}</p>
                    </div>
                    <div class="col-md-4 border-start border-end border-2">
                        <p class="my-1 fw-bold">{{__('Shipping Mode') }}:</p>
                        <p class="my-1 text-muted">{{ $shipment->mode_field ?? '' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="my-1 fw-bold">{{__('Carrier Reference Number') }}:</p>
                        <p class="my-1 text-muted">{{ $shipment->carrier_ref_number ?? '' }}</p>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4">
                        <p class="my-1 fw-bold">{{__('Product') }}(s):</p>
                        <p class="my-1 text-muted">{{ $shipment->product ?? '' }}</p>
                    </div>
                    <div class="col-md-4 border-start border-end border-2">
                        <p class="my-1 fw-bold">{{__('Quantity') }}:</p>
                        <p class="my-1 text-muted">{{ $shipment->qty ?? '' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="my-1 fw-bold">{{__('Payment Mode') }}:</p>
                        <p class="my-1 text-muted">{{ $shipment->payment_method ?? '' }}</p>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4">
                        <p class="my-1 fw-bold">{{_('Total Freight') }}:</p>
                        <p class="my-1 text-muted" >{{ $shipment->total_freight ?? '' }}</p>
                    </div>
                    <div class="col-md-4 border-start border-end border-2">
                        <p class="my-1 fw-bold">{{__('Expected Delivery Date') }}:</p>
                        <p class="my-1 text-muted">{{ $shipment->delivery_date ?? '' }}</p>
                    </div>
                    <div class="col-md-4">
                        <p class="my-1 fw-bold">{{__('Departure Time') }}:</p>
                        <p class="my-1 text-muted">{{ $shipment->departure_time ?? '' }}</p>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-4">
                        <p class="my-1 fw-bold">{{__('Pickup Date') }}:</p>
                        <p class="my-1">{{ $shipment->pickup_date ?? '' }}</p>
                    </div>
                    <div class="col-md-4 border-start border-end border-2">
                        <p class="my-1 fw-bold">{{__('Pickup Time') }}:</p>
                        <p class="my-1">{{ $shipment->pickup_time ?? '' }}</p>
                    </div>
                    <div class="col-md-12">
                        <p class="my-1 fw-bold">{{__('Comments') }}: </p>
                        <p class="my-1 text-muted">{{ $shipment->comments ?? 'N/A' }}</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="text-center mb-3">
                <h2 >{{__('Map Localization') }}</h2>
            </div>
            <div class="row mb-5">
                <div class="col-10 mx-auto">
                    <div id="googleMap" class="rounded mb-3" style="width:100%;height:400px;"></div>
                    <div class="rounded p-3" style="background: #F1F1F1;">
                        <p class="m-0">{{ __("N/B: Information with regards to the current location is merely an approximation") }}</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    @else
    <div class="text-center">
        <h1>No Results found</h1>
    </div>
@endif
