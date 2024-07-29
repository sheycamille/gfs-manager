@extends('layouts.admin')
@section('page-title')
    {{ __('Add New Shipment') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Add Shipment') }}</li>
@endsection



@section('content')
    <div class="p-3">

        <form action="{{ route('shipment.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- end --}}
            <div class="">
                <div class="card card-body">
                    <div id="wrap">
                        <h3 class="mb-3">{{__('Client Information') }}</h3>
                        <div class="row">
                            <div class="form-group col-md-6 my-2">
                                <label for="receiver_name" class="form-label">{{__('Full Name') }}</label>
                                <input class="form-control" name="receiver_name" type="text" id="receiver_name">
                            </div>
                            <div class="form-group col-md-6 my-2">
                                <label for="receiver_phone" class="form-label">{{__('Phone Number') }}</label>
                                <input class="form-control" name="receiver_phone" type="text"
                                    id="receiver_phone">
                            </div>
                            <div class="form-group col-md-6 my-2">
                                <label for="receiver_address" class="form-label">{{__('Address') }}</label>
                                <input class="form-control" name="receiver_address" type="text"
                                    id="receiver_address">
                            </div>
                            <div class="form-group col-md-6 my-2">
                                <label for="receiver_email" class="form-label">{{__('Email') }}</label>
                                <input class="form-control" name="receiver_email" type="text"
                                    id="receiver_email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-body">
                    <h3>{{__('Shipment Details') }}</h3>
                    <div class="row" id="shipment-details">
                        <div class="form-group col-md-12 my-2">
                            <label for="receiver_address" class="form-label">{{__('Pickup Address') }}</label>
                            <input class="form-control" name="receiver_address" type="text"
                                id="receiver_address">
                        </div>
                        <div class="form-group col-md-12 my-2">
                            <label for="receiver_address" class="form-label">{{__('Destination Address') }}</label>
                            <input class="form-control" name="receiver_address" type="text"
                                id="receiver_address">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="receiver_address" class="form-label">{{__('Expected Departure Date') }}</label>
                            <input class="form-control" name="receiver_address" type="date"
                                id="receiver_address">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="receiver_address" class="form-label">{{__('Expected Delivery Date') }}</label>
                            <input class="form-control" name="receiver_address" type="date"
                                id="receiver_address">
                        </div>
                    </div>
                </div>
                <div class="card card-body">
                    <h3 class="">{{__('Commodity Details') }}</h3>
                    <div class="row" id="shipment-details">
                        <div class="form-group col-md-6 my-2">
                            <label for="receiver_address" class="form-label">{{__('Type of Shipment') }}</label>
                            <select class="form-control select" id="choices-multiple" name="type_of_shipment">
                                <option value="">-- Select One --</option>
                                <option value="Air Freight">Air Freight</option>
                                <option value="International Shipping">International Shipping</option>
                                <option value="Truckload">Truckload</option>
                                <option value="Van Move">Van Move</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="receiver_address" class="form-label">{{__('Transport Mode') }}</label>
                            <select class="form-control select" id="choices-multiple" name="type_of_shipment">
                                <option value="">-- Select One --</option>
                                <option value="USPS">USPS</option>
                                
                            </select>
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="receiver_address" class="form-label">{{__('Weight') }}</label>
                            <input class="form-control" name="receiver_address" type="number"
                                id="receiver_address">
                        </div>
                        <div class="form-group col-md-6 my-2">
                            <label for="receiver_address" class="form-label">{{__('Dimensions') }}</label>
                            <input class="form-control" name="receiver_address" type="text"
                                id="receiver_address">
                        </div>
                        <div class="form-group col-md-12 my-2">
                            <label for="receiver_address" class="form-label">{{__('Dimensions') }}</label>
                            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route("shipment.all.show") }}" class="btn btn-light border border-3 mx-2">Cancel</a>
                    <button class="btn btn-primary" type="button">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        var mainContainer = document.querySelector('tbody[data-repeater-list="wpc-multiple-package"]');
        var divisor = 5000;
        var dimMeta = ["package_length", "package_width", "package_height"];
        var qtyMeta = "package_qty";
        var weightMeta = "package_weight";
        var cubic_divisor = 1000000;

        document.addEventListener('DOMContentLoaded', function() {
        function getDecimal(value = 0) {
            value = parseFloat(value);
            if (value >= 1) {
            return 2;
            }
            var str = "0.";
            var dPlace = 1;
            for (i = 1; i < 10; i++) {
            str = str + "0";
            var z_value = str + "1";
            if (parseFloat(value) > parseFloat(z_value)) {
                dPlace = i + 2;
                break;
            }
            }
            return dPlace;
        }

        function calculatePackage() {
            var totalQTY = 0;
            var totalWeight = 0;
            var totalVolumetric = 0;
            var totalVolume = 0;
            var rows = mainContainer.querySelectorAll('tr[data-repeater-item]');
            
            rows.forEach(function(row) {
                
            var currentVolumetric= 0;
            var currentVolume = 0;
            var qty = parseFloat(row.querySelector('input[name="package_qty"]').value) || 0;
            var length = parseFloat(row.querySelector('input[name="package_length"]').value) || 0;
            var width = parseFloat(row.querySelector('input[name="package_width"]').value) || 0;
            var height = parseFloat(row.querySelector('input[name="package_height"]').value) || 0;
            var weight = parseFloat(row.querySelector('input[name="package_weight"]').value) || 0;

            totalQTY += qty;
            totalWeight += weight * qty;

            if (dimMeta.length < 0) {
                var dimSum = 0;
                dimMeta.forEach(function(meta) {
                var metaValue = parseFloat(row.querySelector('input[name="' + meta + '"]').value) || 0;
                dimSum += metaValue;
                });
                currentVolumetric = dimSum * qty;
                currentVolume = currentVolumetric / cubic_divisor;
            } else {
                currentVolumetric = (length * width * height) / divisor *qty;
                currentVolume = (length * width * height) * qty;
            }

            totalVolumetric += currentVolumetric;
            totalVolume += currentVolume;
            });

            var decimalPlace = getDecimal(totalVolumetric);
            document.getElementById("package_volumetric").textContent = totalVolumetric.toFixed(decimalPlace);
            document.getElementById("package_volume").textContent = totalVolume.toFixed(decimalPlace);
            document.getElementById("package_actual_weight").textContent = totalWeight.toFixed(2);
        }

        mainContainer.addEventListener('input', calculatePackage);
        });
    </script>
@endsection
