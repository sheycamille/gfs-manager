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
            background:linear-gradient(0deg, rgba(58, 58, 58, 0.6), rgba(27, 22, 25, 0.6)), url("./assets/images/shipping.jpg");
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

<body class="theme-3" style="font-family: 'Open Sans','Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
    <section class="bg-image overlay" id="header">
        <header class="container">
            <div class="row pt-3 justify-content-between">
                <div class="col-3">
                    <a href="/">
                        <img src="{{ asset("assets/images/GFS_Logo-2.png") }}" height="200px" width="200px" alt="">
                    </a>
                </div>
                <div class="col-7 text-end">
                    <div class="d-flex justify-content-center d-none d-lg-block">
                        <a href="https://www.globalfreightageservices.com/" class="text-white mx-3">Home</a>
                        <a href="https://www.globalfreightageservices.com/about" class="text-white mx-3">About</a>
                        <a href="#" class="text-white mx-3">Tracking</a>
                        <a href="https://www.globalfreightageservices.com/contact" class="text-white mx-3">Contact Us</a>
                    </div>
                    <div class="dropdown d-lg-none">
                        <a href="#" class="btn btn-neutral text-white" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars text-white"></i>
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
        </header>
        <div class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 60vh">
            <h1 class="text-white display-3">Tracking</h1>
        </div>
    </section>
    <section class="container mt-5" id="body">
        <div class="">
            <form action="" method="post" id="tracking-form">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card card-body" >
                            <div class="input-group mb-3">
                                <input type="text" name="tracking_no" required class="form-control" placeholder="Enter Your Tracking No" id="tracking_no">
                                <button class="btn btn-primary px-5 bg-primary" type="submit" id="button-addon1">Track</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
    <section class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="spinner-grow d-none" role="status" id="loader">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div id="results"></div>
            </div>
        </div>
    </section>
    <footer>
        <div class="mx-auto px-5 my-5">
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
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var myCarousel = document.querySelector('#carouselExampleIndicators')
        var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 5000
        })
    </script>
    <script>
        var loader = document.getElementById("loader");
        var resultsContainer = document.getElementById("results");
        const title = document.createElement("h2");
        title.textContent = "No Results found";
        document.getElementById("tracking-form").addEventListener("submit",(e) => {
            e.preventDefault();
            loader.classList.remove("d-none");
            const myHeaders = new Headers();
            myHeaders.append("Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE3MjAxMjc5NDgsImV4cCI6MTcyMDE3MTE0OCwicm9sZXMiOlsiUk9MRV9VU0VSIiwiUk9MRV9BRE1JTiJdLCJ1c2VybmFtZSI6ImRlbW9AZXhhbXBsZS5jb20ifQ.FlOZ9sSBe3ZJMYc60HdECe5bz3HA8W0qvlvYn-5tcSuTAK_CeRjpLIeO0diIe8MbKwr_RPSA1G7hGoChjW3FCxE0KmdA6BRUB4D6TkzfkVfOvNSOmeeP_6uQRefkTiZeVMjyKfsrOXJQze5DByrVlum6GodEA4VVQTEMmP4pbjzV6OzPOyuw1mgaSAGORukj3F6btVHAMJYWM7y32QQLNJ8SS4NA-8FvynSJ-8iadk4_w27uiaDFG5GRhuH7OpORwK4RPAgbVlxZODrTLaN_DCTCVzPkDAh_SPDyJXzcWiGBCMO0WPvjPqlqUzMTeZLYP12Zt7wUxh1EOeX-M5qYcA");

            const formdata = new FormData();
            formdata.append("tracking_no", document.getElementById("tracking_no").value);

            const requestOptions = {
            method: "POST",
            headers: myHeaders,
            body: formdata,
            redirect: "follow"
            };

            fetch("{{ route("api.tracking") }}", requestOptions)
            .then((response) => response.json())
            .then((result) => {
                console.log(result);
                resultsContainer.innerHTML = "";
                if (result.data != null) {
                    resultsContainer.appendChild(
                        createResultCard(result.data)
                    )
                } else {
                    resultsContainer.appendChild(title)
                }
                loader.classList.add("d-none");

            })
            .catch((error) => {
                console.error(error);
                loader.classList.add("d-none");
            });
        });

        function createResultCard(data) {
            const cardDiv = document.createElement("div");
            cardDiv.classList.add("card");  // Add classes
            cardDiv.innerHTML = `<div class="col-md-10 mx-auto py-4">
            <div  class="text-center ">
                <div class="comp_logo">
                    <img decoding="async" src="./assets/images/GFS_Logo.png"
                        style="margin: 0 auto;">
                </div>
                <div class="b_code mt-3">
                    <img decoding="async"
                        src="data:image/png;base64,${data.barcode}"
                        alt="#009314453746" style="margin: 0 auto;">
                </div>
                <div class="shipment-number mt-3">
                    <span style="display: block; font-size: 18px!important;">  ${data.tracking_no}  </span>
                </div><!-- Track_Num -->
            </div>
            <div id="shipper-info" class="row justify-content-evenly mt-5">
                <div class="col-md-5 detail-section">
                    <p id="shipper-header" class="header-title"><strong> Shipper Information </strong></p>
                    <p class="shipper details"> ${data.shipper_name} <br>
                         ${data.shipper_address} <br>
                         ${data.shipper_phone} <br>
                         ${data.shipper_email}  <br></p>
                </div>
                <div class="col-md-5 detail-section">
                    <p id="receiver-header" class="header-title"><strong> Receiver Information </strong></p>
                    <p class="receiver details"> ${data.receiver_name }<br>
                         ${data.receiver_address } <br>
                         ${data.receiver_phone } <br>
                         ${data.receiver_email } <br></p>
                </div>
                <div class="clear-line"></div>
            </div>
            <div id="shipment-status" class="card p-2 mt-4 bg-primary" style="text-align:center;">
                <p class="font-style text-white fs-4"> Shipment Status :  ${data.package_status } </p>
            </div>
            <div class="row">
                <div class="col-md-12 my-4">
                    <p class="fs-4"><strong>Shipment Information</strong></p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Origin :</p>
                    <p> ${data.origin_field } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Package :</p>
                    <p> ${data.packages } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Status :</p>
                    <p><span class="on_hold"> ${data.package_status } </span></p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Destination :</p>
                    <p> ${data.package_status } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Carrier :</p>
                    <p> ${data.carrier } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Type of Shipment :</p>
                    <p> ${data.type_of_shipment } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Weight :</p>
                    <p> ${data.weight } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Shipment Mode :</p>
                    <p> ${data.mode_field } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Carrier Reference No .:</p>
                    <p> ${data.carrier_ref_number } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Product :</p>
                    <p> ${data.product } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Qty :</p>
                    <p> ${data.qty } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Payment Mode :</p>
                    <p> ${data.payment_method } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Total Freight :</p>
                    <p > ${data.total_freight } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Expected Delivery Date :</p>
                    <p class=""> ${data.delivery_date } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Departure Time :</p>
                    <p> ${data.departure_time } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Pickup Date :</p>
                    <p> ${data.pickup_date } </p>
                </div>
                <div class="col-md-4 mb-3">
                    <p class="fw-bold">Pickup Time :</p>
                    <p> ${data.pickup_time } </p>
                </div>
                <div class="col-md-12 mb-3">
                    <p class="fw-bold">Comments : </p>
                    <p> ${data.comments } </p>
                </div>
            </div>
        

    </div>`;

            // (Optional) You can now append this cardDiv to an existing element in your HTML
            // using something like: document.body.appendChild(cardDiv);
            return cardDiv;
        }
    </script>
</body>

</html>
