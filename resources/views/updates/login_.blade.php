<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login to your account</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="/css/updates.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.5/cdn.js" integrity="sha512-8IPRU0MPrge2KfSxkAtO8pIkaMzThW/MBSvPqcyVisSymLWC986buo27pKAt5mWXmt58dT6jIsw7h8NNugtRwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .hide {
            display: none;
            animation: fadeInOut 0.5s ease;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>
</head>

<body class="auth-bg">
    <div class="flex flex-col-reverse md:flex-row md:justify-between md:h-screen">
        <div id="first-div" class="w-full mt-10 md:mt-0 md:w-1/2 h-full hidden md:flex flex-col justify-center items-center">
            <div id="slide1" class="bg-white py-10 px-5 rounded-3xl shadow-lg md:w-[80%] md:h-[70%] text-center relative">
                <img src="/public/images/gsf logo.png" alt="" class="md:h-[35%] w-full">
                <div class="my-5 text-center">
                    <h1 class="text-primary font-bold text-6xl">Welcome To <br /> GFS Manager</h1>
                    <p class="mt-5 gtext-secondary font-bold text-xl">Your Logistic Information Management <br />System
                        (LIMS) ERP</p>
                </div>

                <div class="w-full flex justify-center space-x-2 absolute bottom-0 pb-5">
                    <span class="font-bold mbg-secondary"><svg width="92" height="8" viewBox="0 0 92 8"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.210632" width="90.9875" height="7.91195" rx="3.95598" fill="#F47827" />
                        </svg>
                    </span>

                    <span><svg xmlns="http://www.w3.org/2000/svg" width="48" height="8" viewBox="0 0 48 8"
                            fill="none">
                            <path
                                d="M0.210632 3.95598C0.210632 1.77115 1.98178 0 4.16661 0H43.7264C45.9112 0 47.6824 1.77115 47.6824 3.95598C47.6824 6.1408 45.9112 7.91195 43.7264 7.91195H4.16661C1.98179 7.91195 0.210632 6.1408 0.210632 3.95598Z"
                                fill="#F47827" fill-opacity="0.4" />
                        </svg></span>

                    <span><svg xmlns="http://www.w3.org/2000/svg" width="48" height="8" viewBox="0 0 48 8"
                            fill="none">
                            <path
                                d="M0.210632 3.95598C0.210632 1.77115 1.98178 0 4.16661 0H43.7264C45.9112 0 47.6824 1.77115 47.6824 3.95598C47.6824 6.1408 45.9112 7.91195 43.7264 7.91195H4.16661C1.98179 7.91195 0.210632 6.1408 0.210632 3.95598Z"
                                fill="#F47827" fill-opacity="0.4" />
                        </svg></span>
                </div>
            </div>

            <div id="slide2" class="bg-white py-10 px-5 rounded-3xl shadow-lg md:w-[80%] md:h-[70%] hide text-center relative">
                <div class="w-full md:h-[40%] text-center md:flex md:justify-center">
                    <img src="/public/images/slide2.png" class="md:h-full md:w-[50%]" alt="">
                </div>
                <div class="my-5 text-center">
                    <h1 class="text-primary font-bold text-6xl">Need help <br /> using our site?</h1>
                    <p class="mt-5 gtext-secondary font-bold text-xl">Your Logistic Information Management <br />System
                        (LIMS) ERP</p>
                </div>

                <div class="w-full flex justify-center space-x-2 absolute bottom-0 pb-5">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="48" height="8" viewBox="0 0 48 8"
                            fill="none">
                            <path
                                d="M0.210632 3.95598C0.210632 1.77115 1.98178 0 4.16661 0H43.7264C45.9112 0 47.6824 1.77115 47.6824 3.95598C47.6824 6.1408 45.9112 7.91195 43.7264 7.91195H4.16661C1.98179 7.91195 0.210632 6.1408 0.210632 3.95598Z"
                                fill="#F47827" fill-opacity="0.4" />
                        </svg></span>

                    <span class="font-bold mbg-secondary"><svg width="92" height="8" viewBox="0 0 92 8"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.210632" width="90.9875" height="7.91195" rx="3.95598" fill="#F47827" />
                        </svg>
                    </span>

                    <span><svg xmlns="http://www.w3.org/2000/svg" width="48" height="8" viewBox="0 0 48 8"
                            fill="none">
                            <path
                                d="M0.210632 3.95598C0.210632 1.77115 1.98178 0 4.16661 0H43.7264C45.9112 0 47.6824 1.77115 47.6824 3.95598C47.6824 6.1408 45.9112 7.91195 43.7264 7.91195H4.16661C1.98179 7.91195 0.210632 6.1408 0.210632 3.95598Z"
                                fill="#F47827" fill-opacity="0.4" />
                        </svg></span>
                </div>
            </div>

            <div id="slide3" class="bg-white rounded-3xl shadow-lg md:w-[80%] md:h-[70%] hide relative">
                <div class="h-[40%] w-full rounded-t-3xl py-10" style="background: url('/public/images/slide3.jpeg');background-size: cover;background-repeat: no-repeat;background-position: center;">
                </div>
                <div class="px-5 text-center">
                    <div class="my-5 text-center">
                        <h1 class="text-primary font-bold text-6xl">First time <br /> using this?</h1>
                        <p class="mt-5 gtext-secondary font-bold text-xl">Your Logistic Information Management <br />System
                            (LIMS) ERP</p>
                    </div>
    
                    <div class="w-full flex justify-center space-x-2 absolute bottom-0 pb-5">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="48" height="8" viewBox="0 0 48 8"
                                fill="none">
                                <path
                                    d="M0.210632 3.95598C0.210632 1.77115 1.98178 0 4.16661 0H43.7264C45.9112 0 47.6824 1.77115 47.6824 3.95598C47.6824 6.1408 45.9112 7.91195 43.7264 7.91195H4.16661C1.98179 7.91195 0.210632 6.1408 0.210632 3.95598Z"
                                    fill="#F47827" fill-opacity="0.4" />
                            </svg></span>
    
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="48" height="8" viewBox="0 0 48 8"
                                fill="none">
                                <path
                                    d="M0.210632 3.95598C0.210632 1.77115 1.98178 0 4.16661 0H43.7264C45.9112 0 47.6824 1.77115 47.6824 3.95598C47.6824 6.1408 45.9112 7.91195 43.7264 7.91195H4.16661C1.98179 7.91195 0.210632 6.1408 0.210632 3.95598Z"
                                    fill="#F47827" fill-opacity="0.4" />
                            </svg></span>
    
                        <span class="font-bold mbg-secondary"><svg width="92" height="8" viewBox="0 0 92 8"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.210632" width="90.9875" height="7.91195" rx="3.95598" fill="#F47827" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            
            <p class="text-center text-primary mt-10">@copyright {{ date('Y') }}</p>
        </div>
        <div class="w-full md:w-1/2 bg-primary h-screen md:h-full flex flex-col">
            <nav x-data="{ open: false }" :class="{'items-start': open, 'items-center': !open}" class="bg-white shadow-lg w-full py-3 flex justify-between px-4">
                <div class="hidden md:flex space-x-4 items-center text-[#181A20]">
                    <a href="#" class="gnav-link">About US</a>
                    <a href="#" class="gnav-link">How to use</a>
                    <a href="#" class="gnav-link">Privacy policy</a>
                </div>
                <div class="md:hidden">
                    <button @click="open = !open"><i class="fa-solid fa-bars"></i></button>
                    <div x-show="open" class="md:hidden">
                        <a href="#" class="block py-2">About US</a>
                        <a href="#" class="block py-2">How to use</a>
                        <a href="#" class="block py-2">Privacy policy</a>
                    </div>
                </div>
                <div class="flex space-x-4 items-center gtext-secondary">
                    <button class="auth-icon-bg p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M15.5 14H14.71L14.43 13.73C15.055 13.004 15.5117 12.1488 15.7676 11.2256C16.0234 10.3025 16.0721 9.33417 15.91 8.39002C15.44 5.61002 13.12 3.39002 10.32 3.05002C6.09002 2.53002 2.54002 6.09001 3.05002 10.32C3.39002 13.12 5.61002 15.44 8.39002 15.91C9.33417 16.0721 10.3025 16.0234 11.2256 15.7676C12.1488 15.5117 13.004 15.055 13.73 14.43L14 14.71V15.5L18.26 19.75C18.67 20.16 19.33 20.16 19.74 19.75L19.75 19.74C20.16 19.33 20.16 18.67 19.75 18.26L15.5 14ZM9.50002 14C7.01002 14 5.00002 11.99 5.00002 9.50002C5.00002 7.01002 7.01002 5.00002 9.50002 5.00002C11.99 5.00002 14 7.01002 14 9.50002C14 11.99 11.99 14 9.50002 14ZM9.50002 7.00002C9.22002 7.00002 9.00002 7.22002 9.00002 7.50002V9.00002H7.50002C7.22002 9.00002 7.00002 9.22002 7.00002 9.50002C7.00002 9.78002 7.22002 10 7.50002 10H9.00002V11.5C9.00002 11.78 9.22002 12 9.50002 12C9.78002 12 10 11.78 10 11.5V10H11.5C11.78 10 12 9.78002 12 9.50002C12 9.22002 11.78 9.00002 11.5 9.00002H10V7.50002C10 7.22002 9.78002 7.00002 9.50002 7.00002Z"
                                fill="#F47827" />
                        </svg>
                    </button>
                    <div class="flex items-center auth-icon-bg p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16"
                            fill="none">
                            <path
                                d="M7.725 4.25L7.975 5.5H11.25V9.25H9.15L8.9 8H4.375V4.25H7.725ZM8.75 3H3.125V13.625H4.375V9.25H7.875L8.125 10.5H12.5V4.25H9L8.75 3Z"
                                fill="#F47827" />
                        </svg>
                        <select name="" id="" class="gtext-secondary border-none">
                            <option value="english">
                                English
                            </option>
                        </select>
                    </div>
                </div>
            </nav>
            <div class="flex flex-col py-10 md:py-0 justify-center items-center flex-1">
                <h1 class="text-white font-bold underline text-center text-4xl">Login</h1>
                <form id="form_data" action="{{ route('login') }}" method="POST" id="form_data"
                    class="w-[60%] mt-10">
                    @csrf
                    <div class="mform-group w-full">
                        <label for="" class="text-white">Username</label>
                        <input type="text" name="email_or_phone" placeholder="Email address / Phone number"
                            class="mt-5 w-full bg-transparent text-white placeholder-white pb-2 border-b-2 border-b-white focus:ring-0 focus:ring-offset-0 outline-none">
                        @error('email_or_phone')
                            <span class="text-red-500" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mform-group w-full mt-5">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Enter your password"
                            class="mt-5 w-full bg-transparent text-white placeholder-white pb-2 border-b-2 border-b-white focus:ring-0 focus:ring-offset-0 outline-none">
                        @error('password')
                            <span class="error text-red-500 invalid-password text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <a href="#" class="text-white block my-3">Forgot Password?</a>

                    <input type="submit" value="Submit" id="login_button"
                        class="gtext-secondary my-5 bg-white py-4 w-full text-center rounded-lg">

                    {{-- <h2 class="hr-lines my-5 text-white">Or you can login with</h2>

                    <div class="gtext-secondary my-5 bg-white py-4 w-full text-center rounded-lg flex justify-center">
                        <a href="#"></a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    let slide1 = $('#slide1');
    let slide2 = $('#slide2')
    let slide3 = $('#slide3')

    function toggleSlides() {
        if (slide1.hasClass('hide') && !slide3.hasClass('hide')) {
            slide1.removeClass('hide');
            slide2.addClass('hide');
            slide3.addClass('hide');
        } else if (slide2.hasClass('hide')) {
            slide1.addClass('hide');
            slide2.removeClass('hide');
            slide3.addClass('hide');
        } else {
            slide1.addClass('hide');
            slide2.addClass('hide');
            slide3.removeClass('hide');
        }
    }

    setInterval(toggleSlides, 5000);

    $(document).ready(function() {
        $("#form_data").submit(function(e) {
            $("#login_button").attr("disabled", true);
            return true;
        });
    });
</script>

<!--