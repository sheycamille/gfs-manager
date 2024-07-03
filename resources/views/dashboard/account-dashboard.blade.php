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
                <div class="card-title text-muted pt-2 px-4  d-flex justify-content-between">
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
                            <svg width="80" height="98" viewBox="0 0 98 98" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            <svg width="80" height="98" viewBox="0 0 98 98" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            <svg width="80" height="98" viewBox="0 0 98 98" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                <div class="card-title text-muted pt-2 px-4  d-flex justify-content-between">
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
                    <div class="row justify-content-around">
                        <div class="col-sm-5 text-center py-2 bg-light" style="border-radius: 1rem">
                            <div class="row">
                                <div class="d-none d-sm-block col-sm-3 text-center d-flex align-items-center">
                                    <i class="fa-solid fa-chart-simple fa-3x text-success"></i>
                                </div>
                                <div class="col-xs-9 col-sm-9">
                                    <span class="text-sm text-muted">Balance</span>
                                    <h4>10k XAF</h4>
                                    <span class="text-sm text-success">+23% <span class="text-muted">last month</span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center py-2 bg-light" style="border-radius: 1rem">
                            <div class="row">
                                <div class="d-none d-sm-block col-sm-3 text-center d-flex align-items-center">
                                    <i class="fa-solid fa-sack-dollar fa-3x text-primary"></i>
                                </div>
                                <div class="col-xs-9 col-sm-9">
                                    <span class="text-sm text-muted">Investment</span>
                                    <h4>23M XAF</h4>
                                    <span class="text-sm text-primary">+23% <span class="text-muted">last month</span></span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row justify-content-around mt-1">
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
                                    <i class="fa-solid fa-chart-column fa-3x text-danger"></i>
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
                <div class="card-title text-muted pt-2 text-center">
                    <h4 class="text-muted">
                        {{ __("Actions") }}
                    </h4>
                </div>
                <div class="card-body text-center pt-0">
                    <button class="btn btn-outline-success my-2 p-1">
                        <i class="fa-regular fa-user"></i>
                        <br>
                        <span class="text-sm">
                            Customize Dashboard
                        </span>
                    </button>
                    <br>
                    <button class="btn btn-outline-primary my-2 p-2">
                        <i class="fa-solid fa-chart-column"></i>
                        <br>
                        <span class="text-sm">
                            Cashflow Report
                        </span>
                    </button>
                    <br>
                    <button class="btn btn-outline-info my-2 p-1">
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
                <div class="card-title text-muted pt-2 px-4  d-flex justify-content-between">
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
                <div class="card-title text-muted pt-2 px-4  d-flex justify-content-between">
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
                <div class="card-body pt-1">
                    <div class="row justify-content-between no-gutters">
                        <div class="d-none d-sm-block col-sm-2 d-flex align-items-center">
                            <button class="btn btn-outline-info p-1">
                                <i class="fa-solid fa-circle-dollar-to-slot"></i>
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
                                <i class="fa-solid fa-circle-dollar-to-slot"></i>
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
                                <i class="fa-solid fa-circle-dollar-to-slot"></i>
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
                                <i class="fa-solid fa-circle-dollar-to-slot"></i>
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
                <div class="card-title text-muted pt-2 px-4  d-flex justify-content-between">
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
                <div class="card-body pt-1">
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
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card px-1" style="border-radius: 0;">
                <div class="card-title text-muted pt-2 px-4">
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
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">frankjordan@test.com</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-success">XAF 80k</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-2.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">frankjordan@test.com</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-success">XAF 80k</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-3.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">frankjordan@test.com</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-success">XAF 80k</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">frankjordan@test.com</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-success">XAF 80k</h5>
                        </div>
                    </div>
                    <hr>
                    
                </div>
            </div>
            <div class="card px-1 mt-2" style="border-radius: 0;">
                <div class="card-title text-muted pt-2 px-4">
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
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">Lorem ipsum dolor sit amet consectetur.</span>
                        </div>
                        <div class="col-sm-3 text-muted">
                            <h5 class="text-muted">4m</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-2.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">Lorem ipsum dolor sit amet.</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-muted">6m</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-3.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">Lorem ipsum dolor sit amet</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-muted">2m</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between no-gutters">
                        <div class="col-sm-2 d-flex align-items-center">
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
                        </div>
                        <div class="col-sm-7 ">
                            <h5> Frank Jordan</h5>
                            <span class="text-sm text-muted">Lorem ipsum dolor sit amet</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-muted">7m</h5>
                        </div>
                    </div>
                    <hr>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card px-1" style="border-radius: 0;">
                <div class="card-title text-muted pt-2 px-4  d-flex justify-content-between">
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
                                <th scope="col">Tracking Number</th>
                                <th scope="col">Quantity</th>
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
                <div class="card-title text-muted pt-2 px-4">
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
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
                        </div>
                        <div class="col-sm-3 ">
                            <h5> Shipment 1</h5>
                            <span class="text-sm text-muted">Air Freight</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-info">XAF 80k</h5>
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
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
                        </div>
                        <div class="col-sm-3 ">
                            <h5> Shipment 1</h5>
                            <span class="text-sm text-muted">Air Freight</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-info">XAF 80k</h5>
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
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
                        </div>
                        <div class="col-sm-3 ">
                            <h5> Shipment 1</h5>
                            <span class="text-sm text-muted">Air Freight</span>
                        </div>
                        <div class="col-sm-3 text-right">
                            <h5 class="text-info">XAF 80k</h5>
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
                <div class="card-title text-muted pt-2 px-4">
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
                            <img src="{{ asset("assets/images/user/avatar-1.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
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
                            <img src="{{ asset("assets/images/user/avatar-2.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
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
                            <img src="{{ asset("assets/images/user/avatar-3.jpg") }}" alt="" width="50" height="50" class="rounded-circle">
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
