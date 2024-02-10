<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./output.css" rel="stylesheet" />
    <link href="./input.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="./login.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="bg-gray-200">
    <div class="lg:flex min-h-screen bg-white">
      <!-- ====slider for larger screens==== -->
      <div class="hidden lg:block lg:w-1/2 relative overflow-hidden">
        <!-- Wrapper -->
        <div
          class="min-h-full slides flex justify-center items-center transition-transform duration-500 ease-in-out"
          id="sliderWrapper"
        >
          <!-- First large screen slide -->
          <div id="slide1" class="flex-shrink-0">
            <div class="flex flex-col justify-center items-center py-10">
              <div class="w-4/5">
                <img src="./assets/logo.png" alt="" class="py-5 px-20 w-full" />
              </div>
              <p class="text-blue-500 font-bold mt-5 text-5xl text-center">
                Welcome <br />
                to <br />
                GFS Manager
              </p>
              <div
                class="text-orange-500 text-center text-lg font-semibold p-5 mt-16"
              >
                Your Logistic Information Management System <br />
                (LIMS) ERP
              </div>
            </div>
          </div>

          <!-- Second large screen slide -->
          <div id="slide2" class="hidden relative h-full">
            <div class="slide-content">
              <div class="rounded-lg w-full my-8">
                <img
                  src="./assets/slide2.png"
                  alt=""
                  class="px-10 w-full h-[80%s] object-cover"
                />
              </div>

              <button
                class="text-orange-500 bg-white rounded px-5 py-3 top-8 left-5 flex absolute"
                onclick="showSlide(activeSlide > 1 ? activeSlide - 1 : slideCount)"
              >
                <img src="./assets/back.png" class="mt-1" alt="" />
                <p class="text-sm font-semibold mx-1">Back</p>
              </button>
            </div>
          </div>

          <!-- Third large screen slide -->
          <div id="slide3" class="hidden flex-shrink-0 mx-5">
            <button
              class="text-orange-500 bg-white rounded px-5 py-3 flex"
              onclick="showSlide(activeSlide > 1 ? activeSlide - 1 : slideCount)"
            >
              <img src="./assets/back.png" class="mt-1" alt="" />
              <p class="text-sm font-semibold mx-1">Back</p>
            </button>
            <div class="flex flex-col justify-center">
              <iframe
                class="md:w-[550px]"
                height="500"
                class="mx-auto mt-16"
                x-ref="player"
                src="https://www.youtube.com/embed/CgCPP2KO5ds?si=FBOEKbNDLPzrd2-N"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen
              >
              </iframe>
              <a href="" class="text-gray-500 text-xs p-5 ml-24"
                >Don't know how to use this app?</a
              >
              <div class="my-5 flex justify-center">
                <a
                  href=""
                  class="py-3 px-12 mr-2 rounded-lg bg-orange-500 text-xs text-white"
                >
                  User Documentation guide
                </a>
                <a
                  href=""
                  class="border border-orange-500 py-3 px-12 rounded-lg text-xs text-orange-500"
                >
                  Technical assistant
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Slider indicators -->
        <div
          class="absolute bottom-5 left-0 right-0 flex justify-center space-x-2 p-4"
          id="sliderIndicators"
        >
          <button
            onclick="showSlide(1)"
            class="h-1 rounded-full bg-orange-500 w-12"
          ></button>
          <button
            onclick="showSlide(2)"
            class="h-1 rounded-full bg-gray-300 w-3"
          ></button>
          <button
            onclick="showSlide(3)"
            class="h-1 rounded-full bg-gray-300 w-3"
          ></button>
        </div>
      </div>

      <!-- =======Form for larger screens====== -->
      <div class="form p-8 w-full lg:w-1/2 flex flex-col justify-between text-white bg-primary min-h-screen">
        <div class="">
          <div class="flex justify-between font-semibold text-xs">
            <div class="flex">
              <a href="#">About</a>
              <span class="mx-1">|</span>
              <a href="#">How to use</a>
            </div>
            <!-- ======Language Selector===== -->
            <div class="flex">
              <button
                id="lang-button"
                data-dropdown-toggle="dropdown-lang"
                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm text-center text-white"
                type="button"
              >
                <img src="./assets/us.png" class="h-5 w-5" />
                Eng
                <svg
                  class="w-2.5 h-2.5 ms-2.5"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 10 6"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="m1 1 4 4 4-4"
                  />
                </svg>
              </button>
              <div
                id="dropdown-lang"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-20"
              >
                <ul
                  class="py-2 text-sm text-gray-700"
                  aria-labelledby="states-button"
                >
                  <li>
                    <button
                      type="button"
                      class="inline-flex w-full px-4 py-2 text-sm hover:bg-gray-100"
                    >
                      <div class="inline-flex items-center">English</div>
                    </button>
                  </li>
                  <li>
                    <button
                      type="button"
                      class="inline-flex w-full px-4 py-2 text-sm hover:bg-gray-100"
                    >
                      <div class="inline-flex items-center">French</div>
                    </button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="sm:pt-24 md:pt-0 md:p-24 w-full">
            <h2 class="text-3xl font-semibold text-white text-center mt-5">
              Login
            </h2>
            <p class="text-white text-center my-5">
              Enter your email and password to sign in!
            </p>
            <div class="mt-8">
              <label class="block text-xs mb-2">Login*</label>
              <input
                class="text-xs focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-3 px-4 block w-full appearance-none"
                type="email"
                placeholder="Login, Email or phone number"
                required
              />
            </div>
            <div class="mt-4 w-full">
              <label class="block text-xs mb-2">Password*</label>
              <div class="relative">
                <input
                  id="password"
                  class="text-xs focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-3 px-4 block w-full appearance-none"
                  type="password"
                  placeholder="Enter password"
                />
                <button
                  onclick="togglePasswordVisibility()"
                  class="absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700 focus:outline-none"
                >
                  <i
                    id="passwordVisibilityIcon"
                    class="fa-solid fa-eye-slash"
                  ></i>
                </button>
              </div>
            </div>

            <div class="flex justify-between my-3">
              <div class="flex">
                <input type="checkbox" checked />
                <p class="text-white text-xs mx-2">Keep me logged in</p>
              </div>
              <a href="#" class="text-xs">Forgot password?</a>
            </div>
            <div class="mt-8">
              <button
                class="bg-orange-500 text-white text-sm py-2 px-4 w-full rounded-lg hover:bg-orange-300"
              >
                Sign In
              </button>
            </div>
            <div class="mt-8 flex items-center justify-between">
              <span class="border-b w-1/2 md:w-2/5"></span>
              <a href="#" class="text-xs text-white">or Login with</a>
              <span class="border-b w-1/2 md:w-2/5"></span>
            </div>
            <div class="flex flex-col md:flex-row justify-around mt-3 space-y-5 md:space-y-0 md:space-x-2">
              <button
                class="border border-white py-2 px-16 rounded-lg hover:border-orange-500"
              >
                <i class="fa-brands fa-linkedin"></i>
              </button>
              <button
                class="border border-white py-2 px-16 rounded-lg hover:border-orange-500"
              >
                <i class="fa-brands fa-facebook-f"></i>
              </button>
              <button
                class="border border-white py-2 px-16 rounded-lg hover:border-orange-500"
              >
                <i class="fa-brands fa-google"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="mx-auto p-5">
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
  </body>
</html>
