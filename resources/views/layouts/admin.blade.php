@php
    $logo=URL::TO('assets/images');
    $company_favicon=Utility::getValByName('company_favicon');
    $SITE_RTL = Utility::getValByName('SITE_RTL');
    $setting = \App\Models\Utility::settings();
    $color = 'theme-3';
    if (!empty($setting['color'])) {
        $color = $setting['color'];
    }
    $getseo= App\Models\Utility::getSeoSetting();
    $metatitle =  isset($getseo['meta_title']) ? $getseo['meta_title'] :'';
    $metsdesc= isset($getseo['meta_desc'])?$getseo['meta_desc']:'';
    $meta_image = \App\Models\Utility::get_file('uploads/meta/');
    $meta_logo = isset($getseo['meta_image'])?$getseo['meta_image']:'';
@endphp
    <!DOCTYPE html>
<html lang="en" dir="{{$SITE_RTL == 'on'?'rtl':''}}">
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<head>
    <title>{{(Utility::getValByName('title_text')) ? Utility::getValByName('title_text') : config('app.name', 'ERPGO')}} - @yield('page-title')</title>

    <meta name="title" content="{{$metatitle}}">
    <meta name="description" content="{{$metsdesc}}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:title" content="{{$metatitle}}">
    <meta property="og:description" content="{{$metsdesc}}">
    <meta property="og:image" content="{{$meta_image.$meta_logo}}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title" content="{{$metatitle}}">
    <meta property="twitter:description" content="{{$metsdesc}}">
    <meta property="twitter:image" content="{{$meta_image.$meta_logo}}">


    <script src="{{ asset('js/html5shiv.js') }}"></script>

{{--    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>--}}

    <!-- Meta -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="url" content="{{ url('').'/'.config('chatify.path') }}" data-user="{{ Auth::user()->id }}">
    <link rel="icon" href="{{$logo.'/'.(isset($company_favicon) && !empty($company_favicon)?'gfs_fav_icon.png':'gfs_fav_icon.png')}}" type="image" sizes="16x16">

    <!-- Favicon icon -->
{{--    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon"/>--}}
    <!-- Calendar-->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/main.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/flatpickr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">

    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}">

    <script src="https://kit.fontawesome.com/e734cd0a9e.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!--bootstrap switch-->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap-switch-button.min.css') }}">

    <!-- vendor css -->
    @if ($SITE_RTL == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @endif


    @if($setting['cust_darklayout'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}" id="main-style">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style">
    @endif


    <link rel="stylesheet" href="{{ asset('assets/css/customizer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" >

    @if ($setting['cust_darklayout'] == 'on')
        <link rel="stylesheet" href="{{ asset('css/custom-dark.css') }}" >
    @endif

    @stack('css-page')

    <!-- custom updates css -->
    <link rel="stylesheet" href="/assets/css/updates.css">
    <style>
        .sidebar {
            transition: 0.5s; /* 0.5 second transition effect to slide in the sidebar */
        }

        .sidebar .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        }
        
        .openbtn {
          font-size: 20px;
          cursor: pointer;
          background-color: #111;
          color: white;
          padding: 10px 15px;
          border: none;
        }
        
        .openbtn:hover {
          background-color: #444;
        }
        
        #main-component {
          transition: margin-left .5s;
          padding: 16px;
        }
        #header {
          transition: max-width .5s;
          align-items: center 
        }
        
        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
          .sidebar {padding-top: 15px;}
          .sidebar a {font-size: 18px;}
        }
        </style>
</head>
<body class="{{ $color }}" style="{{ $color == "theme-3"? "background-color: #F6F6F6 !important;":"" }}" id="body">
{{-- <body class="{{ $color }}"> --}}
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>

@include('partials.admin.menu')
<!-- [ navigation menu ] end --> 
<div id="main-component">
    <!-- [ Header ] start -->
    @include('partials.admin.header')
    
    <!-- Modal -->
    <div class="modal notification-modal fade"
         id="notification-modal"
         tabindex="-1"
         role="dialog"
         aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button
                        type="button"
                        class="btn-close float-end"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                    <h6 class="mt-2">
                        <i data-feather="monitor" class="me-2"></i>Desktop settings
                    </h6>
                    <hr/>
                    <div class="form-check form-switch">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="pcsetting1"
                            checked
                        />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting1"
                        >Allow desktop notification</label
                        >
                    </div>
                    <p class="text-muted ms-5">
                        you get lettest content at a time when data will updated
                    </p>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting2"/>
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting2"
                        >Store Cookie</label
                        >
                    </div>
                    <h6 class="mb-0 mt-5">
                        <i data-feather="save" class="me-2"></i>Application settings
                    </h6>
                    <hr/>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting3"/>
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting3"
                        >Backup Storage</label
                        >
                    </div>
                    <p class="text-muted mb-4 ms-5">
                        Automaticaly take backup as par schedule
                    </p>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting4"/>
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting4"
                        >Allow guest to print file</label
                        >
                    </div>
                    <h6 class="mb-0 mt-5">
                        <i data-feather="cpu" class="me-2"></i>System settings
                    </h6>
                    <hr/>
                    <div class="form-check form-switch">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="pcsetting5"
                            checked
                        />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting5"
                        >View other user chat</label
                        >
                    </div>
                    <p class="text-muted ms-5">Allow to show public user message</p>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-light-danger btn-sm"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                    <button type="button" class="btn btn-light-primary btn-sm">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Header ] end -->
    
    <!-- [ Main Content ] start -->
    <div class="dash-container" id="app-content">
        <div class="dash-content position-relative">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center my-3">
                        <div class="col-auto">
                            <div class="page-header-title">
                                <h4 class="m-b-10">@yield('page-title')</h4>
                            </div>
                            <ul class="breadcrumb">
                                @yield('breadcrumb')
                            </ul>
                        </div>
                        <div class="col">
                            @yield('action-btn')
                        </div>
                    </div>
                </div>
            </div>
            <div class="content" style="min-height: 70vh">
                @yield('content')
            </div>
            <footer class="postion-absolute">
                    <div class="card" style="border-radius: 0;">
                        <div class="card-body row mx-auto pt-3 pb-1" >
                            <div class="d-flex justify-content-center">
                                <a href="#" class="text-muted text-underline mx-2">Terms <hr></a>
                                <span class="text-muted mx-1">|</span>
                                <a href="#" class="text-muted text-underline mx-2">Privacy <hr></a>
                                <span class="text-muted mx-1">|</span>
                                <a href="#" class="text-muted text-underline mx-2">Status <hr></a>
                                <span class="text-muted mx-1">|</span>
                                <a href="#" class="text-muted text-underline mx-2">Data <hr></a>
            
                            </div>
                        </div>
                    </div>
            
            </footer>
        <!-- [ Main Content ] end -->
        </div>
    </div>
    <div class="modal fade" id="commonModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="body">
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="commonModalOver" tabindex="-1" role="dialog" aria-labelledby="commonModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commonModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
        <div id="liveToast" class="toast text-white  fade" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body"> </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    
    
    
    @include('partials.admin.footer')
    @include('Chatify::layouts.footerLinks')
</div>
</body>
</html>
<!--