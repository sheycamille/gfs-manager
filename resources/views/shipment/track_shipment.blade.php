@extends('layouts.admin')
@section('page-title')
    {{ __('Track Shipment') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Track Shipment') }}</li>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card p-4">
                <div class="card-title text-center">
                    <h2>{{ __("Track A Shipment") }}</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro adipisci ullam ipsam? Fugiat, neque corporis.</p>
                </div>
                <div class="card-body row">
                    <form action="" class="col-md-6 mx-auto">
                        @csrf
                        <div class="d-flex ">
                            <input type="text" class="form-control" name="tracking_no" placeholder="Enter Your Tracking No" />
                            <button type="submit" class="btn btn-primary">{{__('Track') }}</button>
                        </div>
    
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
