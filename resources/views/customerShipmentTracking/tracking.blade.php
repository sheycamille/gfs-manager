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

<body class="theme-3 font-weight-lighter" style="font-family: 'Open Sans','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-weight: lighter">
    <header class="container py-3 px-5">
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
                            <a href="#" class="text-sm mx-3">Tracking</a>
                            <a href="https://www.globalfreightageservices.com/contact" class="text-sm mx-3">Contact Us</a>
                        </div>
                        <div class="dropdown d-lg-none">
                            <a href="#" class="btn btn-neutral " id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-bars "></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="https://www.globalfreightageservices.com/">Home</a></li>
                              <li><a class="dropdown-item" href="https://www.globalfreightageservices.com/about">About</a></li>
                              <li><a class="dropdown-item" href="#">Tracking</a></li>
                              <li><a class="dropdown-item" href="https://www.globalfreightageservices.com/contact">Contact Us</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="" style="background: #F47827; height: 3px;"></div>
    <section class="bg-image overlay" id="header">
        <div class="d-flex align-items-center justify-content-center" style="min-height: 80vh">
            <div class="container row text-white justify-content-around">
                <div class="col-md-4">
                    <h1 class="text-white mb-4" style="font-family: 'Open Sans','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Track Your Shipment</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae quasi ea inventore culpa autem quod corporis suscipit aliquid laboriosam dicta? Adipisci non amet nostrum! Earum voluptate pariatur doloribus atque a!</p>
                    <form action="{{ route("customer.tracking.search") }}" method="post" id="tracking-form">
                        <div class="input-group mt-5">
                            @csrf
                            <input type="text" name="tracking_no" required class="form-control rounded-start form-control-lg p-3" placeholder="Enter Your Tracking Number" id="tracking_no" required>
                            <span class="p-1 bg-white rounded-end">
                                <button class="btn btn-primary px-5 bg-primary" type="submit" id="button-addon1">Track</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 rounded p-3" style="background: rgba(255, 255, 255, 0.1);backdrop-filter: blur(30px)">
                    <h3 style="font-family: 'Open Sans','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" class="text-white">Having Trouble Tracking Your Shipment?</h3>
                    <p class="my-4">Contact our customer support team for inquiries, issues or reports concerning your shipment.</p>
                    <h3 class="my-2 text-white" style="font-family: 'Open Sans','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Having Trouble Tracking Your Shipment?</h3>
                    <div class="d-grid my-4">
                        <a href="#" class="btn btn-light btn-block my-2">
                            Contact Us
                        </a>
                    </div>
                    <hr>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <p class="my-1"><strong>Call Now Via</strong></p>
                            <a href="#" class="text-sm" style="color: #CCCCCC;">
                                <u>(+237) 677 000 000</u> 
                            </a>
                        </div>
                        <div class="col-md-6 text-end">
                            <p class="my-1"><strong>Customer Support Email</strong></p>
                            <a href="#" class="text-sm" style="color: #CCCCCC;">
                                <u>gfssupport@gmail.go</u> 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container mt-5">
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
</body>

</html>
