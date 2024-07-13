@extends('layouts.admin')
{{-- @section('page-title')
    {{__('Dashboard')}}
@endsection --}}
@push('script-page')
    <script>
        @if(\Auth::user()->can('show account dashboard'))
        (function () {
            var chartBarOptions = {
                series: [
                    {
                        name: "{{__('Income')}}",
                        data:{!! json_encode($incExpLineChartData['income']) !!}
                    },
                    {
                        name: "{{__('Expense')}}",
                        data: {!! json_encode($incExpLineChartData['expense']) !!}
                    }
                ],

                chart: {
                    height: 250,
                    type: 'area',
                    // type: 'line',
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 2,
                    curve: 'smooth'
                },
                title: {
                    text: '',
                    align: 'left'
                },
                xaxis: {
                    categories:{!! json_encode($incExpLineChartData['day']) !!},
                    title: {
                        text: '{{ __("Days") }}'
                    }
                },
                colors: ['#6fd944', '#6fd944'],

                grid: {
                    strokeDashArray: 4,
                },
                legend: {
                    show: false,
                },
                // markers: {
                //     size: 4,
                //     colors: ['#ffa21d', '#FF3A6E'],
                //     opacity: 0.9,
                //     strokeWidth: 2,
                //     hover: {
                //         size: 7,
                //     }
                // },
                yaxis: {
                    title: {
                        text: '{{ __("Amount") }}'
                    },

                }

            };
            var arChart = new ApexCharts(document.querySelector("#cash-flow"), chartBarOptions);
            arChart.render();
        })();
        (function () {
            var options = {
                chart: {
                    height: 180,
                    type: 'bar',
                    toolbar: {
                        show: false,
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 2,
                    curve: 'smooth'
                },
                series: [{
                    name: "{{__('Income')}}",
                    data: {!! json_encode($incExpBarChartData['income']) !!}
                }, {
                    name: "{{__('Expense')}}",
                    data: {!! json_encode($incExpBarChartData['expense']) !!}
                }],
                xaxis: {
                    categories: {!! json_encode($incExpBarChartData['month']) !!},
                },
                colors: ['#3ec9d6', '#FF3A6E'],
                fill: {
                    type: 'solid',
                },
                grid: {
                    strokeDashArray: 4,
                },
                legend: {
                    show: true,
                    position: 'top',
                    horizontalAlign: 'right',
                },
                // markers: {
                //     size: 4,
                //     colors: ['#3ec9d6', '#FF3A6E',],
                //     opacity: 0.9,
                //     strokeWidth: 2,
                //     hover: {
                //         size: 7,
                //     }
                // }
            };
            var chart = new ApexCharts(document.querySelector("#incExpBarChart"), options);
            chart.render();
        })();

        (function () {
            var options = {
                chart: {
                    height: 140,
                    type: 'donut',
                },
                dataLabels: {
                    enabled: false,
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                        }
                    }
                },
                series: {!! json_encode($expenseCatAmount) !!},
                colors: {!! json_encode($expenseCategoryColor) !!},
                labels: {!! json_encode($expenseCategory) !!},
                legend: {
                    show: true
                }
            };
            var chart = new ApexCharts(document.querySelector("#expenseByCategory"), options);
            chart.render();
        })();

        (function () {
            var options = {
                chart: {
                    height: 140,
                    type: 'donut',
                },
                dataLabels: {
                    enabled: false,
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '70%',
                        }
                    }
                },
                series: {!! json_encode($incomeCatAmount) !!},
                colors: {!! json_encode($incomeCategoryColor) !!},
                labels:  {!! json_encode($incomeCategory) !!},
                legend: {
                    show: true
                }
            };
            var chart = new ApexCharts(document.querySelector("#incomeByCategory"), options);
            chart.render();
        })();
        @endif
    </script>
@endpush
@section('content')
    <div class="container card" style="border-radius: 0">
        <div class="d-flex justify-content-between card-body pt-2 pb-0">
            <div class="">
                <h2>{{__('Hi, ')}}{{\Auth::user()->name }} ! </h2>
                <p class="text-muted">{{ __("Your working summary") }}</p>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-primary">
                    <i class="fa fa-plus"></i>
                    Add
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <div class="card px-2" style="border-radius: 0">
                <div class="card-title text-muted pt-3 px-4  d-flex justify-content-between">
                    <span class="">
                        <h4 class="text-muted">
                            {{ __("Operations & Transport") }}
                        </h4>
                        <span class="text-muted text-sm">
                            {{ __("Shipment, Inventory & warehouse tracking") }}
                        </span>
                    </span>
                    <a href="#" class="text-muted">
                        <i class="fa-solid fa-ellipsis-vertical fa-2x mt-1"></i>
                    </a>
                </div>
                <div class="card-body pt-0">
                    <div class="row justify-content-around">
                        <div class="col-sm-3 text-center bg-cyan-100 py-2 mt-1" style="border-radius: 1rem">
                            <svg width="70" height="88" viewBox="0 0 98 98" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="49" cy="49" r="49" fill="white"/>
                                <path d="M40 41H51C51.2652 41 51.5196 41.1054 51.7071 41.2929C51.8946 41.4804 52 41.7348 52 42V53C52 53.2652 51.8946 53.5196 51.7071 53.7071C51.5196 53.8946 51.2652 54 51 54H40C39.7348 54 39.4804 53.8946 39.2929 53.7071C39.1054 53.5196 39 53.2652 39 53V42C39 41.7348 39.1054 41.4804 39.2929 41.2929C39.4804 41.1054 39.7348 41 40 41ZM59 54H52V47H55.5L59 50.231V54Z" stroke="#1C75BC" stroke-width="2" stroke-linejoin="round"/>
                                <path d="M52 55C52 55.5304 52.2107 56.0391 52.5858 56.4142C52.9609 56.7893 53.4696 57 54 57C54.5304 57 55.0391 56.7893 55.4142 56.4142C55.7893 56.0391 56 55.5304 56 55M41 55C41 55.5304 41.2107 56.0391 41.5858 56.4142C41.9609 56.7893 42.4696 57 43 57C43.5304 57 44.0391 56.7893 44.4142 56.4142C44.7893 56.0391 45 55.5304 45 55" stroke="#1C75BC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            {{-- <i class="fa-solid fa-truck fa-3x mt-3 "></i> --}}
                            <h4 class="text-center">564</h4>
                            <p class="text-muted text-center mt-3">
                                Shipment
                                <br>
                                <span class="text-sm text-center text-success">+4% (1 day)</span>
                            </p>
                        </div>
                        <div class="col-sm-3 text-center bg-yellow-100 py-2 mt-1" style="border-radius: 1rem">
                            <svg width="70" height="88" viewBox="0 0 98 98" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="49" cy="49" r="49" fill="white"/>
                                <path d="M37.9198 50.5867V36.8555H41.8412V50.5867L39.8805 48.559L37.9198 50.5867ZM48.4659 56.0837V27H52.3873V52.1045L48.4659 56.0837ZM27.2815 61.3613V46.7111H31.2005V57.3821L27.2815 61.3613ZM27 71L39.8514 57.9513L48.4659 65.4661L64.8553 48.8251H59.2935V46.3612H69V56.2167H66.5734V50.5695L48.5242 68.8958L39.9096 61.381L30.4361 71H27Z" fill="#FFBC37"/>
                            </svg>
                                
                            <h4 class="text-center mt-2">300k</h4>
                            <p class="text-muted text-center mt-3">
                                Inventory
                                <br>
                                <span class="text-sm text-center text-danger">+4% (1 day)</span>
                            </p>
                        </div>
                        <div class="col-sm-3 text-center bg-orange-100 py-2 mt-1" style="border-radius: 1rem">
                            <svg width="70" height="88" viewBox="0 0 98 98" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="49" cy="49" r="49" fill="white"/>
                                <path d="M46.3884 59.559V52.3539H51.6058V59.559C51.6058 60.3515 52.1927 61 52.9101 61H56.8231C57.5405 61 58.1275 60.3515 58.1275 59.559V49.4719H60.3448C60.9448 49.4719 61.2318 48.6506 60.7753 48.2183L49.871 37.3675C49.3754 36.8775 48.6188 36.8775 48.1232 37.3675L37.2189 48.2183C36.7755 48.6506 37.0494 49.4719 37.6494 49.4719H39.8667V59.559C39.8667 60.3515 40.4537 61 41.1711 61H45.0841C45.8015 61 46.3884 60.3515 46.3884 59.559Z" fill="#F47827"/>
                            </svg>    
                            <h4 class="text-center mt-2">564</h4>
                            <p class="text-muted text-center mt-3">
                                Warehouse
                                <br>
                                <span class="text-sm text-center text-warning">+4% (1 day)</span>
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card px-2" style="border-radius: 0">
                <div class="card-title text-muted pt-3 px-4  d-flex justify-content-between">
                    <span class="">
                        <h4 class="text-muted">
                            {{ __("Finance") }}
                        </h4>
                        <span class="text-muted text-sm">
                            {{ __("Finance tracking activities") }}
                        </span>
                    </span>
                    <a href="#" class="text-muted">
                        <i class="fa-solid fa-ellipsis-vertical fa-2x mt-1"></i>
                    </a>
                </div>
                <div class="card-body pt-0">
                    <div class="row justify-content-around mb-3">
                        <div class="col-sm-5 text-center py-2 bg-light" style="border-radius: 1rem">
                            <div class="row">
                                <div class="d-none d-sm-block col-sm-3 text-center d-flex align-items-center">
                                    <i class="fa-solid fa-chart-simple fa-3x text-primary"></i>
                                </div>
                                <div class="col-xs-9 col-sm-9">
                                    <span class="text-sm text-muted">Balance</span>
                                    <h4>10k XAF</h4>
                                    <span class="text-sm text-primary">+23% <span class="text-muted">last month</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center py-2 bg-light" style="border-radius: 1rem">
                            <div class="row">
                                <div class="d-none d-sm-block col-sm-3 text-center d-flex align-items-center">
                                    {{-- <i class="fa-solid fa-sack-dollar fa-3x text-success"></i> --}}
                                    <svg width="42" height="42" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.8662 6.34283C10.7484 6.00812 10.5297 5.71821 10.2401 5.5131C9.95057 5.30799 9.6045 5.19778 9.24967 5.19768H7.92109C7.5442 5.19874 7.18094 5.3388 6.90088 5.59104C6.62083 5.84327 6.44367 6.18995 6.40333 6.56469C6.36299 6.93942 6.46231 7.31587 6.68226 7.62193C6.90221 7.92799 7.22734 8.14215 7.59538 8.2234L9.61481 8.66568C10.028 8.75587 10.3933 8.99563 10.6404 9.33885C10.8876 9.68208 10.9991 10.1045 10.9536 10.525C10.9081 10.9455 10.7087 11.3343 10.3939 11.6167C10.079 11.8991 9.67089 12.0551 9.24795 12.0548H8.10452C7.7501 12.055 7.40434 11.9453 7.11484 11.7408C6.82534 11.5363 6.60633 11.2472 6.48795 10.9131M8.67881 5.19768V3.4834M8.67881 13.7691V12.0548M11.948 23.1411V14.1411C11.948 13.5728 12.1737 13.0277 12.5756 12.6259C12.9774 12.224 13.5225 11.9983 14.0908 11.9983C14.6591 11.9983 15.2042 12.224 15.606 12.6259C16.0079 13.0277 16.2337 13.5728 16.2337 14.1411V18.8554H19.6622C20.5716 18.8554 21.4436 19.2166 22.0866 19.8596C22.7296 20.5026 23.0908 21.3747 23.0908 22.284V23.1411" stroke="#05CD99" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.68043 16.3952C7.09879 16.395 5.55491 15.9119 4.2552 15.0106C2.9555 14.1093 1.96191 12.8328 1.40729 11.3515C0.852662 9.87034 0.763435 8.25511 1.15153 6.72183C1.53963 5.18855 2.38656 3.81028 3.57909 2.7713C4.77161 1.73233 6.25289 1.08216 7.82488 0.907737C9.39687 0.73331 10.9847 1.04293 12.3759 1.79521C13.7672 2.54749 14.8957 3.70657 15.6105 5.11748C16.3253 6.52839 16.5923 8.12388 16.3759 9.69064" stroke="#05CD99" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                <div class="col-xs-9 col-sm-9">
                                    <span class="text-sm text-muted">Investment</span>
                                    <h4>23M XAF</h4>
                                    <span class="text-sm text-success">+23% <span class="text-muted">last month</span></span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row justify-content-around my-4">
                        <div class="col-sm-5 text-center py-2 bg-light" style="border-radius: 1rem; ">
                            <div class="row">
                                <div class="d-none d-sm-block col-sm-3 text-center d-flex align-items-center">
                                    <i class="fa-solid fa-dollar-sign fa-3x text-info"></i>
                                </div>
                                <div class="col-xs-9 col-sm-9">
                                    <span class="text-sm text-muted">Investment</span>
                                    <h4>57M XAF</h4>
                                    <span class="text-sm text-info">+23% <span class="text-muted">last month</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center py-2 bg-light" style="border-radius: 1rem">
                            <div class="row">
                                <div class="d-none d-sm-block col-sm-3 text-center d-flex align-items-center">
                                    {{-- <i class="fa-solid fa-chart-column fa-3x text-danger"></i> --}}
                                    <svg width="42" height="42" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_448_1331)">
                                        <path d="M2.12516 0.857422L21.8394 9.82314M21.8394 9.82314L18.1537 11.2117M21.8394 9.82314L20.468 6.12028M2.1423 10.286H4.71373C4.94106 10.286 5.15907 10.3763 5.31982 10.537C5.48056 10.6978 5.57087 10.9158 5.57087 11.1431V23.1431H1.28516V11.1431C1.28516 10.9158 1.37546 10.6978 1.53621 10.537C1.69695 10.3763 1.91497 10.286 2.1423 10.286ZM10.7137 12.8574H13.2852C13.5125 12.8574 13.7305 12.9477 13.8912 13.1085C14.052 13.2692 14.1423 13.4872 14.1423 13.7146V23.1431H9.85658V13.7146C9.85658 13.4872 9.94689 13.2692 10.1076 13.1085C10.2684 12.9477 10.4864 12.8574 10.7137 12.8574ZM19.2852 15.4289H21.8566C22.0839 15.4289 22.3019 15.5192 22.4627 15.6799C22.6234 15.8406 22.7137 16.0587 22.7137 16.286V23.1431H18.428V16.286C18.428 16.0587 18.5183 15.8406 18.6791 15.6799C18.8398 15.5192 19.0578 15.4289 19.2852 15.4289Z" stroke="#B22234" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_448_1331">
                                        <rect width="24" height="24" fill="white"/>
                                        </clipPath>
                                        </defs>
                                    </svg>
                                        
                                </div>
                                <div class="col-sm-9">
                                    <span class="text-sm text-muted">{{ __("Spent this month") }}</span>
                                    <h4>3M XAF</h4>
                                    <span class="text-sm text-danger">+23% <span class="text-muted">last month</span></span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="card px-2" style="border-radius: 0">
                <div class="card-title text-muted pt-3 text-center">
                    <h4 class="text-muted">
                        {{ __("Actions") }}
                    </h4>
                </div>
                <div class="card-body text-center pt-0 pb-0">
                    <button class="btn btn-outline-info my-2 p-1">
                        <i class="fa-regular fa-user"></i>
                        <br>
                        <span class="text-sm">
                            Customize Dashboard
                        </span>
                    </button>
                    <br>
                    <button class="btn my-2 p-2 btn-outline-success">
                        {{-- <i class="fa-solid fa-chart-column"></i> --}}
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1232_2014)">
                            <path d="M2.12516 0.857422L21.8394 9.82314M21.8394 9.82314L18.1537 11.2117M21.8394 9.82314L20.468 6.12028M2.1423 10.286H4.71373C4.94106 10.286 5.15907 10.3763 5.31982 10.537C5.48056 10.6978 5.57087 10.9158 5.57087 11.1431V23.1431H1.28516V11.1431C1.28516 10.9158 1.37546 10.6978 1.53621 10.537C1.69695 10.3763 1.91497 10.286 2.1423 10.286ZM10.7137 12.8574H13.2852C13.5125 12.8574 13.7305 12.9477 13.8912 13.1085C14.052 13.2692 14.1423 13.4872 14.1423 13.7146V23.1431H9.85658V13.7146C9.85658 13.4872 9.94689 13.2692 10.1076 13.1085C10.2684 12.9477 10.4864 12.8574 10.7137 12.8574ZM19.2852 15.4289H21.8566C22.0839 15.4289 22.3019 15.5192 22.4627 15.6799C22.6234 15.8406 22.7137 16.0587 22.7137 16.286V23.1431H18.428V16.286C18.428 16.0587 18.5183 15.8406 18.6791 15.6799C18.8398 15.5192 19.0578 15.4289 19.2852 15.4289Z" stroke="#05CD99" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_1232_2014">
                            <rect width="24" height="24" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>   
                        <br>
                        <span class="text-sm">
                            Cashflow Report
                        </span>
                    </button>
                    <br>
                    <button class="btn btn-outline-primary my-2 p-1">
                        <i class="fa-solid fa-truck"></i>
                        <br>
                        <span class="text-sm">
                            Schedule Shipment
                        </span>
                    </button>
                    
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card px-2" style="border-radius: 0;">
                <div class="card-title text-muted pt-3 px-4  d-flex justify-content-between">
                    <span class="">
                        <h4 class="text-muted">
                            {{ __("Revenue") }}
                        </h4>
                        <span class="text-muted text-sm">
                            {{ __("Total") }}
                        </span>
                    </span>
                    <a href="#" class="text-muted">
                        <i class="fa-solid fa-ellipsis-vertical fa-2x mt-1"></i>
                    </a>
                </div>
                <div class="card-body pt-0">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card px-1" style="border-radius: 0;">
                <div class="card-title text-muted pt-3 px-4  d-flex justify-content-between">
                    <span class="">
                        <h4 class="text-muted">
                            {{ __("Recent Transactions") }}
                        </h4>
                        <span class="text-muted text-sm">
                            {{ __("Most Recent Transactions") }}
                        </span>
                    </span>
                    <a href="#" class="text-muted">
                        <i class="fa-solid fa-ellipsis-vertical fa-2x mt-1"></i>
                    </a>
                </div>
                <div class="card-body pt-1 pb-0">
                    <div class="row justify-content-between no-gutters">
                        <div class="d-none d-sm-block col-sm-2 d-flex align-items-center">
                            <button class="btn btn-outline-info p-1">
                                {{-- <i class="fa-solid fa-circle-dollar-to-slot"></i> --}}
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.8086 6.25047H20.1686C19.9786 5.98047 19.7786 5.73047 19.5686 5.48047L18.8086 6.25047Z" fill="#1C75BC"/>
                                    <path d="M18.52 4.42031C18.27 4.21031 18.02 4.01031 17.75 3.82031V5.18031L18.52 4.42031Z" fill="#1C75BC"/>
                                    <path d="M19.5795 5.48043L22.5295 2.53043C22.8195 2.24043 22.8195 1.76043 22.5295 1.47043C22.2395 1.18043 21.7595 1.18043 21.4695 1.47043L18.5195 4.42043C18.8995 4.75043 19.2495 5.11043 19.5795 5.48043Z" fill="#1C75BC"/>
                                    <path d="M17.7517 3C17.7517 2.59 17.4117 2.25 17.0017 2.25C16.6017 2.25 16.2817 2.57 16.2617 2.96C16.7817 3.21 17.2817 3.49 17.7517 3.82V3Z" fill="#1C75BC"/>
                                    <path d="M21.7519 7C21.7519 6.59 21.4119 6.25 21.0019 6.25H20.1719C20.5019 6.72 20.7919 7.22 21.0319 7.74C21.4319 7.72 21.7519 7.4 21.7519 7Z" fill="#1C75BC"/>
                                    <path d="M12.75 14.7498H13.05C13.44 14.7498 13.75 14.3998 13.75 13.9698C13.75 13.4298 13.6 13.3498 13.26 13.2298L12.75 13.0498V14.7498Z" fill="#1C75BC"/>
                                    <path d="M21.04 7.74C21.03 7.74 21.02 7.75 21 7.75H17C16.9 7.75 16.81 7.73 16.71 7.69C16.53 7.61 16.38 7.47 16.3 7.28C16.27 7.19 16.25 7.1 16.25 7V3C16.25 2.99 16.26 2.98 16.26 2.96C14.96 2.35 13.52 2 12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 10.48 21.65 9.04 21.04 7.74ZM13.75 11.82C14.39 12.04 15.25 12.51 15.25 13.98C15.25 15.23 14.26 16.26 13.05 16.26H12.75V16.51C12.75 16.92 12.41 17.26 12 17.26C11.59 17.26 11.25 16.92 11.25 16.51V16.26H11.17C9.84 16.26 8.75 15.14 8.75 13.76C8.75 13.34 9.09 13 9.5 13C9.91 13 10.25 13.34 10.25 13.75C10.25 14.3 10.66 14.75 11.17 14.75H11.25V12.53L10.25 12.18C9.61 11.96 8.75 11.49 8.75 10.02C8.75 8.77 9.74 7.74 10.95 7.74H11.25V7.5C11.25 7.09 11.59 6.75 12 6.75C12.41 6.75 12.75 7.09 12.75 7.5V7.75H12.83C14.16 7.75 15.25 8.87 15.25 10.25C15.25 10.66 14.91 11 14.5 11C14.09 11 13.75 10.66 13.75 10.25C13.75 9.7 13.34 9.25 12.83 9.25H12.75V11.47L13.75 11.82Z" fill="#1C75BC"/>
                                    <path d="M10.25 10.03C10.25 10.57 10.4 10.65 10.74 10.77L11.25 10.95V9.25H10.95C10.57 9.25 10.25 9.6 10.25 10.03Z" fill="#1C75BC"/>
                                </svg>
                                    
                            </button>
                        </div>
                        <div class="col-sm-7  ">
                            <h5> Shipment Payment</h5>
                            <span class="text-sm text-muted">Lilly Jamaes</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-info">+ 80k</h5>
                            <span class="text-xs text-muted">2 hours ago</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters mt-1">
                        <div class="d-none d-sm-block col-sm-2 d-flex align-items-center">
                            <button class="btn btn-outline-info p-1">
                                {{-- <i class="fa-solid fa-circle-dollar-to-slot"></i> --}}
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.8086 6.25047H20.1686C19.9786 5.98047 19.7786 5.73047 19.5686 5.48047L18.8086 6.25047Z" fill="#1C75BC"/>
                                    <path d="M18.52 4.42031C18.27 4.21031 18.02 4.01031 17.75 3.82031V5.18031L18.52 4.42031Z" fill="#1C75BC"/>
                                    <path d="M19.5795 5.48043L22.5295 2.53043C22.8195 2.24043 22.8195 1.76043 22.5295 1.47043C22.2395 1.18043 21.7595 1.18043 21.4695 1.47043L18.5195 4.42043C18.8995 4.75043 19.2495 5.11043 19.5795 5.48043Z" fill="#1C75BC"/>
                                    <path d="M17.7517 3C17.7517 2.59 17.4117 2.25 17.0017 2.25C16.6017 2.25 16.2817 2.57 16.2617 2.96C16.7817 3.21 17.2817 3.49 17.7517 3.82V3Z" fill="#1C75BC"/>
                                    <path d="M21.7519 7C21.7519 6.59 21.4119 6.25 21.0019 6.25H20.1719C20.5019 6.72 20.7919 7.22 21.0319 7.74C21.4319 7.72 21.7519 7.4 21.7519 7Z" fill="#1C75BC"/>
                                    <path d="M12.75 14.7498H13.05C13.44 14.7498 13.75 14.3998 13.75 13.9698C13.75 13.4298 13.6 13.3498 13.26 13.2298L12.75 13.0498V14.7498Z" fill="#1C75BC"/>
                                    <path d="M21.04 7.74C21.03 7.74 21.02 7.75 21 7.75H17C16.9 7.75 16.81 7.73 16.71 7.69C16.53 7.61 16.38 7.47 16.3 7.28C16.27 7.19 16.25 7.1 16.25 7V3C16.25 2.99 16.26 2.98 16.26 2.96C14.96 2.35 13.52 2 12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 10.48 21.65 9.04 21.04 7.74ZM13.75 11.82C14.39 12.04 15.25 12.51 15.25 13.98C15.25 15.23 14.26 16.26 13.05 16.26H12.75V16.51C12.75 16.92 12.41 17.26 12 17.26C11.59 17.26 11.25 16.92 11.25 16.51V16.26H11.17C9.84 16.26 8.75 15.14 8.75 13.76C8.75 13.34 9.09 13 9.5 13C9.91 13 10.25 13.34 10.25 13.75C10.25 14.3 10.66 14.75 11.17 14.75H11.25V12.53L10.25 12.18C9.61 11.96 8.75 11.49 8.75 10.02C8.75 8.77 9.74 7.74 10.95 7.74H11.25V7.5C11.25 7.09 11.59 6.75 12 6.75C12.41 6.75 12.75 7.09 12.75 7.5V7.75H12.83C14.16 7.75 15.25 8.87 15.25 10.25C15.25 10.66 14.91 11 14.5 11C14.09 11 13.75 10.66 13.75 10.25C13.75 9.7 13.34 9.25 12.83 9.25H12.75V11.47L13.75 11.82Z" fill="#1C75BC"/>
                                    <path d="M10.25 10.03C10.25 10.57 10.4 10.65 10.74 10.77L11.25 10.95V9.25H10.95C10.57 9.25 10.25 9.6 10.25 10.03Z" fill="#1C75BC"/>
                                </svg>
                            </button>
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Shipment Payment</h5>
                            <span class="text-sm text-muted">Lilly Jamaes</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-info">+ 80k</h5>
                            <span class="text-xs text-muted">2 hours ago</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters mt-1">
                        <div class="d-none d-sm-block col-sm-2 d-flex align-items-center">
                            <button class="btn btn-outline-info p-1">
                                {{-- <i class="fa-solid fa-circle-dollar-to-slot"></i> --}}
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.8086 6.25047H20.1686C19.9786 5.98047 19.7786 5.73047 19.5686 5.48047L18.8086 6.25047Z" fill="#1C75BC"/>
                                    <path d="M18.52 4.42031C18.27 4.21031 18.02 4.01031 17.75 3.82031V5.18031L18.52 4.42031Z" fill="#1C75BC"/>
                                    <path d="M19.5795 5.48043L22.5295 2.53043C22.8195 2.24043 22.8195 1.76043 22.5295 1.47043C22.2395 1.18043 21.7595 1.18043 21.4695 1.47043L18.5195 4.42043C18.8995 4.75043 19.2495 5.11043 19.5795 5.48043Z" fill="#1C75BC"/>
                                    <path d="M17.7517 3C17.7517 2.59 17.4117 2.25 17.0017 2.25C16.6017 2.25 16.2817 2.57 16.2617 2.96C16.7817 3.21 17.2817 3.49 17.7517 3.82V3Z" fill="#1C75BC"/>
                                    <path d="M21.7519 7C21.7519 6.59 21.4119 6.25 21.0019 6.25H20.1719C20.5019 6.72 20.7919 7.22 21.0319 7.74C21.4319 7.72 21.7519 7.4 21.7519 7Z" fill="#1C75BC"/>
                                    <path d="M12.75 14.7498H13.05C13.44 14.7498 13.75 14.3998 13.75 13.9698C13.75 13.4298 13.6 13.3498 13.26 13.2298L12.75 13.0498V14.7498Z" fill="#1C75BC"/>
                                    <path d="M21.04 7.74C21.03 7.74 21.02 7.75 21 7.75H17C16.9 7.75 16.81 7.73 16.71 7.69C16.53 7.61 16.38 7.47 16.3 7.28C16.27 7.19 16.25 7.1 16.25 7V3C16.25 2.99 16.26 2.98 16.26 2.96C14.96 2.35 13.52 2 12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 10.48 21.65 9.04 21.04 7.74ZM13.75 11.82C14.39 12.04 15.25 12.51 15.25 13.98C15.25 15.23 14.26 16.26 13.05 16.26H12.75V16.51C12.75 16.92 12.41 17.26 12 17.26C11.59 17.26 11.25 16.92 11.25 16.51V16.26H11.17C9.84 16.26 8.75 15.14 8.75 13.76C8.75 13.34 9.09 13 9.5 13C9.91 13 10.25 13.34 10.25 13.75C10.25 14.3 10.66 14.75 11.17 14.75H11.25V12.53L10.25 12.18C9.61 11.96 8.75 11.49 8.75 10.02C8.75 8.77 9.74 7.74 10.95 7.74H11.25V7.5C11.25 7.09 11.59 6.75 12 6.75C12.41 6.75 12.75 7.09 12.75 7.5V7.75H12.83C14.16 7.75 15.25 8.87 15.25 10.25C15.25 10.66 14.91 11 14.5 11C14.09 11 13.75 10.66 13.75 10.25C13.75 9.7 13.34 9.25 12.83 9.25H12.75V11.47L13.75 11.82Z" fill="#1C75BC"/>
                                    <path d="M10.25 10.03C10.25 10.57 10.4 10.65 10.74 10.77L11.25 10.95V9.25H10.95C10.57 9.25 10.25 9.6 10.25 10.03Z" fill="#1C75BC"/>
                                </svg>
                            </button>
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Shipment Payment</h5>
                            <span class="text-sm text-muted">Lilly Jamaes</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-info">+ 80k</h5>
                            <span class="text-xs text-muted">2 hours ago</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters mt-1">
                        <div class="d-none d-sm-block col-sm-2 d-flex align-items-center">
                            <button class="btn btn-outline-info p-1">
                                {{-- <i class="fa-solid fa-circle-dollar-to-slot"></i> --}}
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.8086 6.25047H20.1686C19.9786 5.98047 19.7786 5.73047 19.5686 5.48047L18.8086 6.25047Z" fill="#1C75BC"/>
                                    <path d="M18.52 4.42031C18.27 4.21031 18.02 4.01031 17.75 3.82031V5.18031L18.52 4.42031Z" fill="#1C75BC"/>
                                    <path d="M19.5795 5.48043L22.5295 2.53043C22.8195 2.24043 22.8195 1.76043 22.5295 1.47043C22.2395 1.18043 21.7595 1.18043 21.4695 1.47043L18.5195 4.42043C18.8995 4.75043 19.2495 5.11043 19.5795 5.48043Z" fill="#1C75BC"/>
                                    <path d="M17.7517 3C17.7517 2.59 17.4117 2.25 17.0017 2.25C16.6017 2.25 16.2817 2.57 16.2617 2.96C16.7817 3.21 17.2817 3.49 17.7517 3.82V3Z" fill="#1C75BC"/>
                                    <path d="M21.7519 7C21.7519 6.59 21.4119 6.25 21.0019 6.25H20.1719C20.5019 6.72 20.7919 7.22 21.0319 7.74C21.4319 7.72 21.7519 7.4 21.7519 7Z" fill="#1C75BC"/>
                                    <path d="M12.75 14.7498H13.05C13.44 14.7498 13.75 14.3998 13.75 13.9698C13.75 13.4298 13.6 13.3498 13.26 13.2298L12.75 13.0498V14.7498Z" fill="#1C75BC"/>
                                    <path d="M21.04 7.74C21.03 7.74 21.02 7.75 21 7.75H17C16.9 7.75 16.81 7.73 16.71 7.69C16.53 7.61 16.38 7.47 16.3 7.28C16.27 7.19 16.25 7.1 16.25 7V3C16.25 2.99 16.26 2.98 16.26 2.96C14.96 2.35 13.52 2 12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 10.48 21.65 9.04 21.04 7.74ZM13.75 11.82C14.39 12.04 15.25 12.51 15.25 13.98C15.25 15.23 14.26 16.26 13.05 16.26H12.75V16.51C12.75 16.92 12.41 17.26 12 17.26C11.59 17.26 11.25 16.92 11.25 16.51V16.26H11.17C9.84 16.26 8.75 15.14 8.75 13.76C8.75 13.34 9.09 13 9.5 13C9.91 13 10.25 13.34 10.25 13.75C10.25 14.3 10.66 14.75 11.17 14.75H11.25V12.53L10.25 12.18C9.61 11.96 8.75 11.49 8.75 10.02C8.75 8.77 9.74 7.74 10.95 7.74H11.25V7.5C11.25 7.09 11.59 6.75 12 6.75C12.41 6.75 12.75 7.09 12.75 7.5V7.75H12.83C14.16 7.75 15.25 8.87 15.25 10.25C15.25 10.66 14.91 11 14.5 11C14.09 11 13.75 10.66 13.75 10.25C13.75 9.7 13.34 9.25 12.83 9.25H12.75V11.47L13.75 11.82Z" fill="#1C75BC"/>
                                    <path d="M10.25 10.03C10.25 10.57 10.4 10.65 10.74 10.77L11.25 10.95V9.25H10.95C10.57 9.25 10.25 9.6 10.25 10.03Z" fill="#1C75BC"/>
                                </svg>
                            </button>
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Shipment Payment</h5>
                            <span class="text-sm text-muted">Lilly Jamaes</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-info">+ 80k</h5>
                            <span class="text-xs text-muted">2 hours ago</span>
                        </div>
                    </div>
                    <hr>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card px-1" style="border-radius: 0;">
                <div class="card-title text-muted pt-3 px-4  d-flex justify-content-between">
                    <span class="">
                        <h4 class="text-muted">
                            {{ __("Invoices") }}
                        </h4>
                        <span class="text-muted text-sm">
                            {{ __("Recently Created Invoices") }}
                        </span>
                    </span>
                    <a href="#" class="text-muted">
                        <i class="fa-solid fa-ellipsis-vertical fa-2x mt-1"></i>
                    </a>
                </div>
                <div class="card-body pt-1 pb-0" style="overflow-x: scroll">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Date</th>
                            <th scope="col" class="text-center">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Invoice 1</td>
                            <td>17/09/2023</td>
                            <td class="text-center"><span class="badge bg-success">Paid</span></td>
                          </tr>
                          <tr>
                            <td>Invoice 2</td>
                            <td>17/09/2023</td>
                            <td class="text-center"><span class="badge bg-primary">Unpaid</span></td>
                          </tr>
                          <tr>
                            <td>Invoice 3</td>
                            <td>17/09/2023</td>
                            <td class="text-center"><span class="badge bg-success">Paid</span></td>
                          </tr>
                          <tr>
                            <td>Invoice 4</td>
                            <td>17/09/2023</td>
                            <td class="text-center"><span class="badge bg-primary">Unpaid</span></td>
                          </tr>
                          <tr>
                            <td>Invoice 5</td>
                            <td>17/09/2023</td>
                            <td class="text-center"><span class="badge bg-danger">Payment Failed</span></td>
                          </tr>
                          <tr>
                            <td>Invoice 6</td>
                            <td>17/09/2023</td>
                            <td class="text-center"><span class="badge bg-danger">Payment Failed</span></td>
                          </tr>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card px-1" style="border-radius: 0;">
                <div class="card-title text-muted pt-3 px-4">
                    <div class="d-flex justify-content-between">
                        <span class="">
                            <h4 class="text-muted">
                                {{ __("Top Customers") }}
                            </h4>
                            <span class="text-muted text-sm">
                                {{ __("View customers with higher process") }}
                            </span>
                        </span>
                        <a href="#" class="text-muted">
                            <i class="fa-solid fa-ellipsis-vertical fa-2x mt-1"></i>
                        </a>
                    </div>
                    <button class="btn btn-primary">
                        234 <span class="text-sm">total customers</span>
                    </button>
                </div>
                <div class="card-body pt-1">
                    <div class="d-none d-sm-block d-flex justify-content-between">
                        <span>Customer</span>
                        <span>Total Purchase</span>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">frankjordan@test.com</span>
                        </div>
                        <div class="col-sm-3 text-right d-flex align-items-center">
                            <h5 class="text-success">XAF 80k</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-2.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">frankjordan@test.com</span>
                        </div>
                        <div class="col-sm-3 text-right d-flex align-items-center">
                            <h5 class="text-success">XAF 80k</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-3.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">frankjordan@test.com</span>
                        </div>
                        <div class="col-sm-3 text-right d-flex align-items-center">
                            <h5 class="text-success">XAF 80k</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">frankjordan@test.com</span>
                        </div>
                        <div class="col-sm-3 text-right d-flex align-items-center">
                            <h5 class="text-success">XAF 80k</h5>
                        </div>
                    </div>
                    <hr>
                    
                </div>
            </div>
            <div class="card px-1 mt-2" style="border-radius: 0;">
                <div class="card-title text-muted pt-3 px-4">
                    <div class="d-flex justify-content-between">
                        <span class="">
                            <h4 class="text-muted">
                                {{ __("Messages") }}
                            </h4>
                            <span class="text-muted text-sm">
                                {{ __("Recent Messages") }}
                            </span>
                        </span>
                        <a href="#" class="text-muted">
                            <i class="fa-solid fa-ellipsis-vertical fa-2x mt-1"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body pt-1">
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">Lorem ipsum dolor sit amet consectetur.</span>
                        </div>
                        <div class="col-sm-3 text-muted">
                            <h6 class="text-muted">4m</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-2.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">Lorem ipsum dolor sit amet.</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h6 class="text-muted">6m</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-3.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">Lorem ipsum dolor sit amet</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h6 class="text-muted">2m</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">Lorem ipsum dolor sit amet</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h6 class="text-muted">7m</h6>
                        </div>
                    </div>
                    <hr>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card px-1" style="border-radius: 0;">
                <div class="card-title text-muted pt-3 px-4  d-flex justify-content-between">
                    <span class="">
                        <h4 class="text-muted">
                            {{ __("Freight Management") }}
                        </h4>
                        <span class="text-muted text-sm">
                            {{ __("View Shipment currently in transit") }}
                        </span>
                    </span>
                    <a href="#" class="text-muted">
                        <i class="fa-solid fa-ellipsis-vertical fa-2x mt-1"></i>
                    </a>
                </div>
                <div class="card-body pt-1">
                    <div id="googleMap" style="width:100%;height:400px;"></div>
                    <div class="input-group my-3">
                        <span class="input-group-prepend">
                            <button class="btn btn-outline-secondary bg-white border-start-0 border ms-n3" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        <input class="form-control border-end-0 border" type="text" placeholder="Search ..." id="example-search-input">
                    </div>
                    <div class="" style="overflow: scroll">
                        <table class="table" >
                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Tracking #</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Date</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Shipment 1</td>
                                <td>Cameroon</td>
                                <td>0090988</td>
                                <td>54kg</td>
                                <td>17/09/2023</td>
                              </tr>
                              <tr>
                                <td>Shipment 2</td>
                                <td>Ghana</td>
                                <td>0090988</td>
                                <td>54kg</td>
                                <td>17/09/2023</td>
                              </tr>
                              <tr>
                                <td>Shipment 3</td>
                                <td>Nigeria</td>
                                <td>0090988</td>
                                <td>54kg</td>
                                <td>17/09/2023</td>
                              </tr>
                              <tr>
                                <td>Shipment 4</td>
                                <td>Congo</td>
                                <td>0090988</td>
                                <td>54kg</td>
                                <td>17/09/2023</td>
                              </tr>
                              <tr>
                                <td>Shipment 5</td>
                                <td>Cameroon</td>
                                <td>0090988</td>
                                <td>54kg</td>
                                <td>17/09/2023</td>
                              </tr>
                              <tr>
                                <td>Shipment 6</td>
                                <td>Cameroon</td>
                                <td>0090988</td>
                                <td>54kg</td>
                                <td>17/09/2023</td>
                              </tr>
                              <tr>
                                <td>Shipment 7</td>
                                <td>Benin</td>
                                <td>0090988</td>
                                <td>54kg</td>
                                <td>17/09/2023</td>
                              </tr>
                              <tr>
                                <td>Shipment 8</td>
                                <td>South</td>
                                <td>0090988</td>
                                <td>54kg</td>
                                <td>17/09/2023</td>
                              </tr>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="card px-1" style="border-radius: 0;">
                <div class="card-title text-muted pt-3 px-4">
                    <div class="d-flex justify-content-between">
                        <span class="">
                            <h4 class="text-muted">
                                {{ __("Top Shipments") }}
                            </h4>
                            <span class="text-muted text-sm">
                                {{ __("View top shipments") }}
                            </span>
                        </span>
                        <a href="#" class="text-muted">
                            <i class="fa-solid fa-ellipsis-vertical fa-2x mt-1"></i>
                        </a>
                    </div>
                    <button class="btn btn-primary">
                        234 <span class="text-sm">total shipments</span>
                    </button>
                </div>
                <div class="card-body pt-1">
                    <div class="d-flex justify-content-around">
                        <span class="d-none d-sm-block">Shipment Name & Type</span>
                        <span class="d-none d-sm-block">Price Sold</span>
                        <span class="d-none d-sm-block">Shipment Progress</span>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-1 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-sm-3 ">
                            <h5> Shipment 1</h5>
                            <span class="text-sm text-muted">Air Freight</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-info d-block d-md-none">XAF 80k</h5>
                            <h5 class="text-info d-none d-sm-block text-center">XAF 80k</h5>
                        </div>
                        <div class="col-sm-4">
                            <div class="progress" style="height: 15px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 70%" valuenow="70" aria-valuemin="0" aria-valuemax="100"> 70% </div>
                            </div>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-1 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-sm-3 ">
                            <h5> Shipment 1</h5>
                            <span class="text-sm text-muted">Air Freight</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-info d-block d-md-none">XAF 80k</h5>
                            <h5 class="text-info d-none d-sm-block text-center">XAF 80k</h5>
                        </div>
                        <div class="col-sm-4">
                            <div class="progress" style="height: 15px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 70%" valuenow="70" aria-valuemin="0" aria-valuemax="100"> 70% </div>
                            </div>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-1 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-sm-3 ">
                            <h5> Shipment 1</h5>
                            <span class="text-sm text-muted">Air Freight</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-info d-block d-md-none">XAF 80k</h5>
                            <h5 class="text-info d-none d-sm-block text-center">XAF 80k</h5>
                        </div>
                        <div class="col-sm-4">
                            <div class="progress" style="height: 15px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 70%" valuenow="70" aria-valuemin="0" aria-valuemax="100"> 70% </div>
                            </div>
                        </div>
                        
                    </div>
                    <hr>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card px-1" style="border-radius: 0;">
                <div class="card-title text-muted pt-3 px-4">
                    <div class="d-flex justify-content-between">
                        <span class="">
                            <h4 class="text-muted">
                                {{ __("Overdue Shipments") }}
                            </h4>
                            <span class="text-muted text-sm">
                                {{ __("View overdue shipments") }}
                            </span>
                        </span>
                        <a href="#" class="text-muted">
                            <i class="fa-solid fa-ellipsis-vertical fa-2x mt-1"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body pt-1">
                    <div class="d-flex justify-content-around">
                        <span class="d-none d-sm-block">Shipment Name & Type</span>
                        <span class="d-none d-sm-block">Expected Delivery</span>
                        <span class="d-none d-sm-block">Last Scan Location</span>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-xs-12 col-sm-1 d-flex align-items-center justify-content-center">
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-xs-12 col-sm-3 text-center">
                            <h6> Shipment 1</h6>
                            <span class="text-sm text-muted">Air Freight</span>
                        </div>
                        <div class="col-xs-12 col-sm-3 text-right">
                            <h6 class="text-primary text-center">Cameroon, Douala</h6>
                            <h6 class="text-primary text-center">12/09/2024</h6>
                        </div>
                        <div class="col-xs-12 col-sm-4 text-center">
                            <h6 class="text-muted text-center">Nigeria, Abuja</h6>
                            <h6 class="text-muted text-center">12/09/2024</h6>
                        </div>
                        
                    </div>
                    <hr><div class="row justify-content-between no-gutters">
                        <div class="col-sm-1 d-flex align-items-center justify-content-center">
                            <img src="{{ asset("assets/images/user/avatar-2.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-sm-3 text-center">
                            <h6> Shipment 2</h6>
                            <span class="text-sm text-muted">Air Freight</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h6 class="text-primary text-center">Cameroon, Douala</h6>
                            <h6 class="text-primary text-center">12/09/2024</h6>
                        </div>
                        <div class="col-sm-4 text-right">
                            <h6 class="text-muted text-center">Nigeria, Abuja</h6>
                            <h6 class="text-muted text-center">12/09/2024</h6>
                        </div>
                        
                    </div>
                    <hr><div class="row justify-content-between no-gutters">
                        <div class="col-sm-1 d-flex align-items-center justify-content-center">
                            <img src="{{ asset("assets/images/user/avatar-3.jpg") }}" alt="" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col-sm-3 text-center">
                            <h6> Shipment 3</h5>
                            <span class="text-sm text-muted">Air Freight</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h6 class="text-primary text-center">Cameroon, Douala</h6>
                            <h6 class="text-primary text-center">12/09/2024</h6>
                        </div>
                        <div class="col-sm-4 text-right">
                            <h6 class="text-muted text-center">Nigeria, Abuja</h6>
                            <h6 class="text-muted text-center">12/09/2024</h6>
                        </div>
                        
                    </div>
                    <hr>
                    
                </div>
            </div>
        </div>
        
    </div>

    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Charges', 'Adds', 'Billing'],
                datasets: [{
                    data: [25, 30, 15],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
        });
    </script>
    <script>
        function myMap() {
        var mapProp= {
          center:new google.maps.LatLng(51.508742,-0.120850),
          zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
    </script>
@endsection
