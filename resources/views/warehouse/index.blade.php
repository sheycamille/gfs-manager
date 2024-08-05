@extends('layouts.admin')
@section('page-title')
    {{ __('Warehouse') }}
@endsection
@push('script-page')
@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Warehouse') }}</li>
@endsection
@section('action-btn')
    <div class="float-end">
        @can('create warehouse')
            <a href="#" data-size="lg" data-url="{{ route('warehouse.create') }}" data-ajax-popup="true"
                data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create Warehouse') }}"
                class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        @endcan

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between mb-2">
                        <div class="col-auto mb-3 mb-sm-0 pb-3">
                            <div class="d-flex align-items-center">
                                <span class="badge rounded-circle bg-primary p-2">
                                    <i class="ti ti-cast text-2x"></i>
                                </span>
                                <div class="ms-3">
                                    <h6 class="text-muted">{{ __('Total No Warehouses') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto mb-3 mb-sm-0">
                        <div class="">
                            <div class="d-flex flex-row ms-2">
                                <div class="">
                                    <h2 class="m-0 display-6">{{ __('0') }}</h2>
                                </div>
                                <div class="my-auto px-3 ">
                                    <span class="badge bg-danger text-dark rounded-pill px-3 py-2">5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute top-74px height-18px fw-500"><small
                            class="text-muted">{{ __('than last month') }}</small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between mb-2">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-warning">
                                    <i class="ti ti-cast"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted">{{ __('Quantity') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto mb-3 mb-sm-0">
                        <div class="">
                            <div class="d-flex flex-row ms-2">
                                <div class="">
                                    <h2 class="m-0 display-6">{{ __('0') }}</h2>
                                </div>
                                <div class="my-auto px-3">
                                    <span class="badge bg-success text-dark rounded-pill px-3 py-2 ">5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute top-74px height-18px fw-500"><small
                            class="text-muted">{{ __('than last month') }}</small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between mb-2">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-warning">
                                    <i class="ti ti-cast"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted">{{ __('Utilization') }}</h6>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-auto mb-3 mb-sm-0">
                        <div class="">
                            <div class="d-flex flex-row ms-2">
                                <div class="">
                                    <h2 class="m-0 display-6">{{ __('0') }}</h2>
                                </div>
                                <div class="my-auto px-3">
                                    <span class="badge bg-danger text-dark rounded-pill px-3 py-2 ">5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute top-74px height-18px fw-500"><small
                            class="text-muted">{{ __('than last month') }}</small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between mb-2">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-warning">
                                    <i class="ti ti-cast"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted">{{ __('Utilization') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto mb-3 mb-sm-0">
                        <div class="">
                            <div class="d-flex flex-row ms-2">
                                <div class="">
                                    <h2 class="m-0 display-6">{{ __('0') }}</h2>
                                </div>
                                <div class="my-auto px-3">
                                    <span class="badge bg-success text-dark rounded-pill px-3 py-2 ">5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute top-74px height-18px fw-500"><small
                            class="text-muted">{{ __('than last month') }}</small></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-3">
                        <div class="col-6">
                            <h6>Warehouse Locations</h6>
                        </div>
                        <div class="col-6 mx-auto">
                            <div class="d-flex flex-column align-items-end">
                                <a href="{{route('warehouse.create')}}" class="btn btn-primary">New Warehouse</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18906.129712753736!2d6.722624160288201!3d60.12672284414915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x463e997b1b6fc09d%3A0x6ee05405ec78a692!2sJ%C4%99zyk%20trola!5e0!3m2!1spl!2spl!4v1672239918130!5m2!1spl!2spl"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Address') }}</th>
                                    <th>{{ __('City') }}</th>
                                    <th>{{ __('Zip Code') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($warehouses as $warehouse)
                                    <tr class="font-style">
                                        <td>{{ $warehouse->name }}</td>
                                        <td>{{ $warehouse->address }}</td>
                                        <td>{{ $warehouse->city }}</td>
                                        <td>{{ $warehouse->city_zip }}</td>

                                        @if (Gate::check('show warehouse') || Gate::check('edit warehouse') || Gate::check('delete warehouse'))
                                            <td class="Action">
                                                @can('show warehouse')
                                                    <div class="action-btn bg-warning ms-2">
                                                        <a href="{{ route('warehouse.show', $warehouse->id) }}"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                            data-bs-toggle="tooltip" title="{{ __('View') }}"><i
                                                                class="ti ti-eye text-white"></i></a>
                                                    </div>
                                                @endcan
                                                @can('edit warehouse')
                                                    <div class="action-btn bg-info ms-2">
                                                        <a href="#" class="mx-3 btn btn-sm  align-items-center"
                                                            data-url="{{ route('warehouse.edit', $warehouse->id) }}"
                                                            data-ajax-popup="true" data-size="lg " data-bs-toggle="tooltip"
                                                            title="{{ __('Edit') }}"
                                                            data-title="{{ __('Edit Warehouse') }}">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                @endcan
                                                @can('delete warehouse')
                                                    <div class="action-btn bg-danger ms-2">
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['warehouse.destroy', $warehouse->id],
                                                            'id' => 'delete-form-' . $warehouse->id,
                                                        ]) !!}
                                                        <a href="#"
                                                            class="mx-3 btn btn-sm  align-items-center bs-pass-para"
                                                            data-bs-toggle="tooltip" title="{{ __('Delete') }}"><i
                                                                class="ti ti-trash text-white"></i></a>
                                                        {!! Form::close() !!}
                                                    </div>
                                                @endcan
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row ">
                        <div class="col-6">
                            <h6>Item Tracker</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('Item ID') }}</th>
                                    <th>{{ __('Item Name') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Location(From)') }}</th>
                                    <th>{{ __('Location(Destination)') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
