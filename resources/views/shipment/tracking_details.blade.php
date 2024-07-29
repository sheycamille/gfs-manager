@extends('layouts.admin')
@section('page-title')
    {{ __('Track Shipment') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Track Shipment') }}</li>
@endsection

@section('content')
<div class="container card">
    @include('shipment.includes.tracking-details-body')
</div>

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
