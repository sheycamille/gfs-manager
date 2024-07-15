@php
    $logo=URL::TO('assets/images');
    $company_favicon=Utility::getValByName('company_favicon');
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{$logo.'/'.(isset($company_favicon) && !empty($company_favicon)?'gfs_fav_icon.png':'gfs_fav_icon.png')}}" type="image" sizes="16x16">
    <link href="./output.css" rel="stylesheet" />
    <link href="./input.css" rel="stylesheet" />
    <title>Tracking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/main.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style">
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <script src="./login.js"></script>
    <style>
        .bg-image {
            background:linear-gradient(0deg, rgba(58, 58, 58, 0.6), rgba(27, 22, 25, 0.6)), url("./assets/images/tracking-bg.png");
            background-repeat: no-repeat; 
            /* min-height: 100vh; */
            background-position: center;
            background-size: cover  
        }
        .bg-image2 {
            background:linear-gradient(0deg, rgba(58, 58, 58, 0.6), rgba(27, 22, 25, 0.6)), url("./assets/images/tracking-bg2.png");
            background-repeat: no-repeat; 
            /* min-height: 100vh; */
            background-position: center;
            background-size: cover  
        }
        
        .btn-primary2 {
            --bs-btn-color: #F47827;
            --bs-btn-bg: #F47827;
            --bs-btn-border-color: #F47827;
            --bs-btn-hover-color: #ffffff;
            --bs-btn-hover-bg: #F47827;
            --bs-btn-hover-border-color: #F47827;
            --bs-btn-focus-shadow-rgb: 133, 223, 95;
            --bs-btn-active-color: #ffffff;
            --bs-btn-active-bg: #F47827;
            --bs-btn-active-border-color: #F47827;
            --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
            --bs-btn-disabled-color: #ffffff;
            --bs-btn-disabled-bg: #F47827;
            --bs-btn-disabled-border-color: #F47827;
            
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="theme-3 font-weight-lighter" style="font-family: 'Open Sans','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-weight: lighter; background-color: rgb(246, 246, 246) !important;">
    <header class="container py-3 px-5 bg-white">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="row pt-3 justify-content-between">
                    <div class="col-3">
                        <a href="/">
                            <img src="{{ asset("assets/images/GFS_Logo.png") }}" style="height: 50px; width: 200px;" alt="">
                        </a>
                    </div>
                    <div class="col-7 text-end">
                        <div class="d-flex justify-content-center d-none d-lg-block">
                            <a href="https://www.globalfreightageservices.com/" class="text-sm mx-3">Home</a>
                            <a href="https://www.globalfreightageservices.com/about" class="text-sm mx-3">About</a>
                            <a href="{{ route("customer.tracking.page") }}" class="text-sm mx-3">Tracking</a>
                            <a href="https://www.globalfreightageservices.com/contact" class="text-sm mx-3">Contact Us</a>
                        </div>
                        <div class="dropdown d-lg-none">
                            <a href="#" class="btn btn-neutral " id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-bars "></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="https://www.globalfreightageservices.com/">Home</a></li>
                              <li><a class="dropdown-item" href="https://www.globalfreightageservices.com/about">About</a></li>
                              <li><a class="dropdown-item" href="{{ route("customer.tracking.page") }}">Tracking</a></li>
                              <li><a class="dropdown-item" href="https://www.globalfreightageservices.com/contact">Contact Us</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="" style="background: #F47827; height: 3px;"></div>
    <section class="row" id="">
        <div class="col-9 mx-auto row align-items-center">
            <div class="col-auto">
                <div class="page-header-title">
                    <h4 class="m-b-10">@yield('page-title')</h4>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item text-sm"> <a href="{{route('customer.tracking.page')}}">{{__('Tracking')}}</a></li>
                    <li class="breadcrumb-item text-sm"> {{__('Tracking Results')}}</li>
                    {{-- <li class="breadcrumb-item">{{__('Bill Create')}}</li> --}}
                </ul>
            </div>
        </div>
    </section>
    <section class="bg-white py-5">
        <div class="row">
            <div class="col-md-9 mx-auto rounded border-warning border border-2" style="border-color: #F47827 important!;">
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
                                <h2 style="font-family: 'Open Sans','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{__('Shipment Information') }}</h2>
                            </div>
                            <div class="card card-body border">
                                <div class="row my-2">
                                    <div class="col-md-4">
                                        <p class="my-1 fw-bold">{{__('Origin') }}:</p>
                                        <p class="my-1 text-muted">{{ $shipment->origin_field ?? '' }}</p>
                                    </div>
                                    <div class="col-md-4 border-start border-end ">
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
                                    <div class="col-md-4 border-start border-end">
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
                                    <div class="col-md-4 border-start border-end ">
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
                                    <div class="col-md-4 border-start border-end ">
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
                                    <div class="col-md-4 border-start border-end ">
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
                                    <div class="col-md-4 border-start border-end ">
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
                                <h2 style="font-family: 'Open Sans','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{__('Map Localization') }}</h2>
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

            </div>
        </div>
    </section>
    <section class="container mt-5 bg-white">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="d-flex justify-content-center">
                    <div class="col-md-5 bg-image2 rounded-start text-white p-5">
                        <h2 class="text-capitalize text-white" style="font-family: 'Open Sans','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Need help using our platform?</h2>
                        <p>Watch this videos to learn more <i class="fa-solid fa-arrow-right"></i></p>
                    </div>
                    <iframe class="d-none d-lg-block rounded-end" height="500" width="50%" class="ml-3 mt-16" x-ref="player"
                        src="https://www.youtube.com/embed/CgCPP2KO5ds?si=FBOEKbNDLPzrd2-N"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-white mt-5" style="background: #303030;">
        <div class="" style="background: #F47827; height: 3px;"></div>
        <div class="mx-auto px-5 py-2">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="d-flex justify-content-between">
                        <div class=""><p class="text-xs text-center mt-2">@2024 LIMS. ALl Rights Reserved</p></div>
                        <div class="">
                            <a href="#" class="text-xs mt-1">Terms</a>
                            <span class="mx-1">|</span>
                            <a href="#" class="text-xs mt-1">Privacy</a>
                            <span class="mx-1">|</span>
                            <a href="#" class="text-xs mt-1">Status</a>
                            <span class="mx-1">|</span>
                            <a href="#" class="text-xs mt-1">Data</a>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function myMap() {
        var mapProp= {
          center:new google.maps.LatLng(51.508742,-0.120850),
          zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
</body>

</html>
