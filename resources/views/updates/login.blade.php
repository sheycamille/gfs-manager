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
    <title>Login to your account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <script src="./login.js"></script>
    <style>
        .bg-image {
            background-image: url("./assets/slide2.png");
            background-repeat: no-repeat; 
            min-height: 100vh;
            /* background-attachment: fixed; */
            background-position: center;
            background-size: cover  
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-200" style="font-family: 'Open Sans','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
    <div class="lg:flex min-h-screen bg-white align-center">
        <!-- ====slider for larger screens==== -->
        <div class="flex align-center content-center h-[400px] md:h-full lg:block lg:w-1/2 relative overflow-hidden my-3">
            <!-- Wrapper -->
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div id="slide1" class="flex-shrink-0 px-3">
                            <div class="flex flex-col justify-center items-center py-10">
                                <div class="w-2/4 md:w-4/5 flex justify-content-center align-items-center text-center mb-2">
                                    <div class="d-none d-lg-block">
                                        <img src="{{ asset("assets/images/GFS_Logo.png") }}" style="width: 90%; height: 80%; " class="py-5 px-20" />
                                    </div>
                                    <div class="d-lg-none">
                                        <img src="{{ asset("assets/images/GFS_Logo.png") }}" style="width: 190%; height: 180%; " />
                                    </div>
                                    
                                </div>
                                
                                <p class="text-blue-500 font-bold md:mt-5 md:text-5xl text-center" style="font-weight: 2000">
                                    Welcome <br />
                                    to <br />
                                    GFS Manager
                                </p>
                                <div class="text-orange-500 text-center text-lg font-semibold md:px-2 md:p-5 md:mt-16">
                                    Your Logistic Information Management System <br />
                                    (LIMS) ERP
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item container">
                        <div id="slide2" class="h-full w-full">
                            <div class="slide-content">
                                <div class="rounded-lg w-full my-8 bg-image d-none d-lg-block">
                                        <button class="text-orange-500 bg-white rounded px-5 py-3 flex">
                                            <img src="./assets/back.png" class="mt-1" alt="" />
                                            <p class="text-sm font-semibold mx-1">Back</p>
                                        </button>
                                </div>
                                <div class="d-lg-none">
                                        <button class="text-orange-500 bg-white rounded px-5 py-3 flex">
                                            <img src="./assets/back.png" class="mt-1" alt="" />
                                            <p class="text-sm font-semibold mx-1">Back</p>
                                        </button>
                                        <div class="">
                                            <img src="./assets/slide2.png" alt="">
                                        </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div id="slide3" class="container md:my-6">
                            <button class="text-orange-500 bg-white rounded px-5 py-3 mb-5 flex">
                                <img src="./assets/back.png" class="mt-1" alt="" />
                                <p class="text-sm font-semibold mx-1">Back</p>
                            </button>
                            <div class="container d-flex justify-content-center ">
                                <iframe class="d-none d-lg-block" height="500" width="90%" class="ml-3 mt-16" x-ref="player"
                                    src="https://www.youtube.com/embed/CgCPP2KO5ds?si=FBOEKbNDLPzrd2-N"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <a href="#" class="text-muted text-xs d-none d-lg-block mx-5 mt-3">Don't know how to use this app?</a>
                            <div class="d-lg-none">
                                <iframe class="" height="70%" width="100%" class="mx-auto mt-16" x-ref="player"
                                    src="https://www.youtube.com/embed/CgCPP2KO5ds?si=FBOEKbNDLPzrd2-N"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <a href="#" class="text-muted text-xs d-lg-none mt-3">Don't know how to use this app?</a>
                            <div class="mt-5">
                                <div class="mb-5 mt-3 d-flex justify-content-around">
                                    <a href="" class="py-3 px-12 mr-2 rounded-lg bg-orange-500 text-xs text-white">
                                        User Documentation guide
                                    </a>
                                    <a href=""
                                        class="border border-orange-500 py-3 px-12 rounded-lg text-xs text-orange-500">
                                        Technical assistant
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- =======Form for larger screens====== -->
        <div class="form p-8 w-full lg:w-1/2 flex flex-col justify-between text-white min-h-screen" style="background-color: #1C75BC">
            <div class="">
                <div class="hidden md:flex justify-between font-semibold text-xs">
                    <div class="d-flex align-items-center">
                        <a href="#">About</a>
                        <span class="mx-1">|</span>
                        <a href="#">How to use</a>
                    </div>
                    <!-- ======Language Selector===== -->
                    <div class="flex dropdown">
                        <button class="btn btn-neutral btn-sm d-flex justify-content-around text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="mx-1">
                                <img src="./assets/us.png" class="h-5 w-5" />
                            </span>
                            <span class="mx-1">
                                EN
                            </span>
                            <span class="mx-1">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                            
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route("customer.tracking.page") }}">Tracking</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                          </ul>
                        <div id="dropdown-lang"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-20">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="states-button">
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 text-sm hover:bg-gray-100">
                                        <div class="inline-flex items-center">English</div>
                                    </button>
                                </li>
                                <li>
                                    <button type="button"
                                        class="inline-flex w-full px-4 py-2 text-sm hover:bg-gray-100">
                                        <div class="inline-flex items-center">French</div>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="sm:pt-24 md:mt-36 md:pt-0 px-5 w-full">
                    <h2 class="text-3xl text-white text-center mt-5" style="font-family: 'Open Sans'">
                        Login
                    </h2>
                    <p class="text-white text-center my-5">
                        Enter your email and password to sign in!
                    </p>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mt-8">
                            <label class="block text-xs mb-2">Login*</label>
                            <input
                                name="email_or_phone"
                                class="text-xs text-black focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-3 px-4 block w-full appearance-none"
                                type="email" placeholder="Login, Email or phone number" required />
                                @error('email_or_phone')
                                    <span class="text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="mt-4 w-full">
                            <label class="block text-xs mb-2">Password*</label>
                            <div class="relative">
                                <input id="password"
                                    name="password"
                                    class="text-xs text-black focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-3 px-4 block w-full appearance-none"
                                    type="password" placeholder="Enter password" />
                                <button onclick="togglePasswordVisibility()"
                                    class="absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                                    <i id="passwordVisibilityIcon" class="fa-solid fa-eye-slash"></i>
                                </button>
                                @error('password')
                                    <span class="error text-red-500 invalid-password text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-between my-3">
                            <div class="flex">
                                <input type="checkbox" name="remember" />
                                <p class="text-white text-xs mx-2">Keep me logged in</p>
                            </div>
                            <a href="#" class="text-xs">Forgot password?</a>
                        </div>
                        <div class="mt-8">
                            <button
                                class="bg-orange-500 text-white text-sm py-2 px-4 w-full rounded-lg hover:bg-orange-300">
                                Sign In
                            </button>
                        </div>
                    </form>
                    {{-- <div class="mt-8 flex items-center justify-between">
                        <span class="border-b w-1/2 md:w-2/5"></span>
                        <a href="#" class="text-xs text-white">or Login with</a>
                        <span class="border-b w-1/2 md:w-2/5"></span>
                    </div>
                    <div class="flex flex-col md:flex-row justify-around mt-3 space-y-5 md:space-y-0 md:space-x-2">
                        <button class="border border-white py-2 px-16 rounded-lg hover:border-orange-500">
                            <i class="fa-brands fa-linkedin"></i>
                        </button>
                        <button class="border border-white py-2 px-16 rounded-lg hover:border-orange-500">
                            <i class="fa-brands fa-facebook-f"></i>
                        </button>
                        <button class="border border-white py-2 px-16 rounded-lg hover:border-orange-500">
                            <i class="fa-brands fa-google"></i>
                        </button>
                    </div> --}}
                </div>
            </div>
            <div class="mx-auto px-5 mt-5">
                <div class="flex w-full justify-center">
                    <a href="#" class="text-xs mt-1">Terms</a>
                    <span class="mx-1">|</span>
                    <a href="#" class="text-xs mt-1">Privacy</a>
                    <span class="mx-1">|</span>
                    <a href="#" class="text-xs mt-1">Status</a>
                    <span class="mx-1">|</span>
                    <a href="#" class="text-xs mt-1">Data</a>
                </div>
                <p class="text-xs text-center mt-2">@2024 LIMS. ALl Rights Reserved</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var myCarousel = document.querySelector('#carouselExampleIndicators')
        var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 5000
        })
    </script>
</body>

</html>
