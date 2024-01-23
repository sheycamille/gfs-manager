@extends('layouts.admin')
@section('page-title')
    {{ __('Edit Shipment') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit Shipment') }}</li>
@endsection



@section('content')
    <div class=" mt-5 p-3">

        <form action="{{ route('shipment.update',$shipment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <input type="text" class="form-control" name="tracking_no" value="{{ $shipment->tracking_no }}" id="tracking_no"
                            placeholder="Enter tracking number">
                    </div>
                </div>

            </div>
            {{-- end --}}
            <div class="row">
                <div class="row justify-content-evenly">
                    <div class="card col-md-8 p-3">
                        <div id="wrap">
                            <div class="row d-lg-flex justify-content-evenly mt-4">
                                <div id="shipper-details" class="col-md-6">
                                    <h3 class="mb-3">{{__('Shipper Details') }}</h3>
                                    <div class="form-group col">
                                        <label for="shipper_name" class="form-label">{{__('Shipper Name') }}</label>
                                        <input class="form-control" name="shipper_name" type="text" id="shipper_name" value="{{ $shipment->shipper_name }}">
                                    </div>
                                    <div class="form-group col">
                                        <label for="shipper_phone" class="form-label">{{__('Phone Number') }}</label>
                                        <input class="form-control" name="shipper_phone" type="text" value="{{ $shipment->shipper_phone }}" id="shipper_phone">
                                    </div>
                                    <div class="form-group col">
                                        <label for="shipper_address" class="form-label">{{__('Address') }}</label>
                                        <input class="form-control" name="shipper_address" type="text" value="{{ $shipment->shipper_address }}"
                                            id="shipper_address">
                                    </div>
                                    <div class="form-group col">
                                        <label for="shipper_email" class="form-label">{{__('Email') }}</label>
                                        <input class="form-control" name="shipper_email" type="text" value="{{ $shipment->shipper_email }}" id="shipper_email">
                                    </div>


                                </div> <!-- receiver-details -->
                                <div id="receiver-details" class="col-md-6">
                                    <h3 class="mb-3">Receiver Details</h3>
                                    <div class="form-group col">
                                        <label for="receiver_name" class="form-label">{{__('Receiver Details') }}</label>
                                        <input class="form-control" name="receiver_name" type="text" value="{{ $shipment->receiver_name }}" id="receiver_name">
                                    </div>
                                    <div class="form-group col">
                                        <label for="receiver_phone" class="form-label">{{__('Phone Number') }}</label>
                                        <input class="form-control" name="receiver_phone" type="text" value="{{ $shipment->receiver_phone }}"
                                            id="receiver_phone">
                                    </div>
                                    <div class="form-group col">
                                        <label for="receiver_address" class="form-label">{{__('Address') }}</label>
                                        <input class="form-control" name="receiver_address" type="text" value="{{ $shipment->receiver_address }}"
                                            id="receiver_address">
                                    </div>
                                    <div class="form-group col">
                                        <label for="receiver_email" class="form-label">{{__('Email') }}</label>
                                        <input class="form-control" name="receiver_email" type="text" value="{{ $shipment->receiver_email }}"
                                            id="receiver_email">
                                    </div>
                                </div>
                            </div>
                            <div class="clear-line"></div>
                            <div class="row" id="shipment-details">
                                <h3>{{__('Shipment Details') }}</h3>
                                <div class="col-md-6"id="section-1">

                                    <div class="btn-box">
                                        <label for="account" class="form-label">{{__('Type of Shipment') }}</label>
                                        <select class="form-control select" id="choices-multiple" name="type_of_shipment">
                                            <option value="">-- Select One --</option>
                                            <option value="Air Freight" {{ $shipment->type_of_shipment == "Air Freight" ? 'selected' : ''}}>{{__('Air Freight') }}</option>
                                            <option value="International Shipping" {{ $shipment->type_of_shipment == "International Shipping" ? 'selected' : ''}}> {{__('International Shipping') }}</option>
                                            <option value="Truckload" {{ $shipment->type_of_shipment == "Truckload" ? 'selected' : ''}}>{{__('Truckload') }}</option>
                                            <option value="Van Move" {{ $shipment->type_of_shipment == "Van Move" ? 'selected' : ''}}>{{__('Van Move') }}</option>
                                        </select>
                                    </div>
                                    <div class="col form-group mt-2">
                                        <label for="weight" class="form-label">{{__('Weight') }}</label>
                                        <input class="form-control" name="weight" type="text" value="{{ $shipment->weight }}" id="weight">
                                    </div>

                                    <div class="col form-group ">
                                        <label for="packages" class="form-label">{{__('Packages') }}</label>
                                        <input class="form-control" name="packages" type="text" value="{{ $shipment->packages }}" id="packages">
                                    </div>
                                    <div class="btn-box">
                                        <label for="choices-multiple" class="form-label">{{ __('Mode') }}</label>
                                        <select class="form-control select" id="choices-multiple" name="mode_field" >
                                            <option value="">-- Select One --</option>
                                            <option value="Air Freight" {{ $shipment->mode_field == "Air Freight" ? 'selected' : '' }}>{{__('Air Freight') }}</option>
                                            <option value="Sea Transport" {{ $shipment->mode_field == "Sea Transport" ? 'selected' : '' }}>{{__('Sea Transport') }}</option>
                                            <option value="Land Shipping" {{ $shipment->mode_field == "Land Shipping" ? 'selected' : '' }}>{{__('Land Shipping') }}</option>
                                            <option value="Air Freight" {{ $shipment->mode_field == "Air Freight" ? 'selected' : '' }}>{{__('Air Freight') }}</option>
                                        </select>
                                    </div>
                                    <div class="col form-group mt-2">
                                        <label for="product" class="form-label">{{__('Product') }}</label>
                                        <input class="form-control" name="product" type="text" value="{{ $shipment->product }}" id="product">
                                    </div>
                                    <div class="form-group ">
                                        <label for="qty" class="form-label">{{__('Quantity') }}</label>
                                        <input class="form-control" name="qty" type="text" value="{{ $shipment->qty }}" id="qty">
                                    </div>
                                    <div class="btn-box">
                                        <label for="choices-multiple" class="form-label">{{__('Payment Mode') }}</label>
                                        <select class="form-control select" id="choices-multiple" name="payment_method" >
                                            <option value="">-- Select One --</option>
                                            <option value="Online" {{ $shipment->payment_method == "Online" ? 'selected':''}}>{{__('Online') }}</option>
                                            <option value="Onsite" {{ $shipment->payment_method == "Onsite" ? 'selected':''}}>{{__('Onsite') }}</option>

                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="total_freight" class="form-label">{{__('Total Freight') }}</label>
                                        <input class="form-control" name="total_freight" type="text"  value="{{ $shipment->total_freight }}"
                                            id="total_freight">
                                    </div>
                                </div>{{-- end section 1 --}}

                                <div class="col-md-6" id="section-2">

                                    <div class="btn-box">
                                        <label for="choices-multiple" class="form-label">{{__('Carrier') }}</label>
                                        <select class="form-control select" id="choices-multiple" name="carrier_field" >
                                            <option value="">-- Select One --</option>
                                            <option value="USPS" {{ $shipment->carrier_field == "USPS" ? 'selected' : '' }}>USPS</option>

                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="carrier_ref_number" class="form-label">{{__('Carrier Reference No') }}.</label>
                                        <input class="form-control" name="carrier_ref_number" type="text" value="{{ $shipment->carrier_ref_number }}"
                                            id="carrier_ref_number">
                                    </div>
                                    <div class="form-group ">
                                        <label for="departure_time" class="form-label">{__('Departure Time') }}</label>
                                        <input class="form-control" name="departure_time" type="time" value="{{ $shipment->departure_time }}"
                                            id="departure_time">
                                    </div>
                                    <div class="btn-box">
                                        <label for="choices-multiple" class="form-label">{{__('Origin') }}</label>
                                        <select class="form-control select" id="choices-multiple" name="origin_field">
                                            <option value="">-- Select One --</option>
                                            <option value="Afghanistan" {{ $shipment->origin_field == "Afghanistan" ? 'selected' : '' }}>Afghanistan</option>
                                            <option value="Albania" {{ $shipment->origin_field == " Albania" ? 'selected' : '' }}>Albania</option>
                                            <option value="Algeria" {{ $shipment->origin_field == "Algeria" ? 'selected' : '' }}>Algeria</option>
                                            <option value="American Samoa"  {{ $shipment->origin_field == "American Samoa" ? 'selected' : '' }}>American Samoa</option>
                                            <option value="Andorra"   {{ $shipment->origin_field == "Andorra" ? 'selected' : '' }}>Andorra</option>
                                            <option value="Angola" {{ $shipment->origin_field == "Angola" ? 'selected' : '' }}>Angola</option>
                                            <option value="Anguilla"  {{ $shipment->origin_field == "Anguilla" ? 'selected' : '' }}>Anguilla</option>
                                            <option value="Antigua &amp; Barbuda"   {{ $shipment->origin_field == "Antigua & Barbuda" ? 'selected' : '' }}>Antigua &amp; Barbuda</option>
                                            <option value="Argentina"   {{ $shipment->origin_field == "Argentina" ? 'selected' : '' }}>Argentina</option>
                                            <option value="Armenia"   {{ $shipment->origin_field == "Armenia" ? 'selected' : '' }}>Armenia</option>
                                            <option value="Aruba"   {{ $shipment->origin_field == "Aruba " ? 'selected' : '' }}>Aruba</option>
                                            <option value="Australia" {{ $shipment->origin_field == "Australia" ? 'selected' : '' }}>Australia</option>
                                            <option value="Austria" {{ $shipment->origin_field == "Austria" ? 'selected' : '' }}>Austria</option>
                                            <option value="Azerbaijan" {{ $shipment->origin_field == "Azerbaijan" ? 'selected' : '' }}>Azerbaijan</option>
                                            <option value="Bahamas" {{ $shipment->origin_field == "Bahamas" ? 'selected' : '' }}>Bahamas</option>
                                            <option value="Bahrain" {{ $shipment->origin_field == "Bahrain" ? 'selected' : '' }}>Bahrain</option>
                                            <option value="Bangladesh" {{ $shipment->origin_field == "Bangladesh" ? 'selected' : '' }}>Bangladesh</option>
                                            <option value="Barbados" {{ $shipment->origin_field == "Barbados" ? 'selected' : '' }}>Barbados</option>
                                            <option value="Belarus" {{ $shipment->origin_field == "Belarus" ? 'selected' : '' }}>Belarus</option>
                                            <option value="Belgium" {{ $shipment->origin_field == "Belgium" ? 'selected' : '' }}>Belgium</option>
                                            <option value="Belize" {{ $shipment->origin_field == "Belize" ? 'selected' : '' }}>Belize</option>
                                            <option value="Benin" {{ $shipment->origin_field == "Benin" ? 'selected' : '' }}>Benin</option>
                                            <option value="Bermuda" {{ $shipment->origin_field == "Bermuda" ? 'selected' : '' }}>Bermuda</option>
                                            <option value="Bhutan" {{ $shipment->origin_field == "Bhutan" ? 'selected' : '' }}>Bhutan</option>
                                            <option value="Bolivia" {{ $shipment->origin_field == "Bolivia" ? 'selected' : '' }}>Bolivia</option>
                                            <option value="Bosnia &amp; Herzegovina" {{ $shipment->origin_field == "Bosnia & Herzegovina" ? 'selected' : '' }}>Bosnia &amp; Herzegovina</option>
                                            <option value="Botswana" {{ $shipment->origin_field == "Botswana" ? 'selected' : '' }}>Botswana</option>
                                            <option value="Brazil" {{ $shipment->origin_field == "Brazil" ? 'selected' : '' }}>Brazil</option>
                                            <option value="British Virgin Is." {{ $shipment->origin_field == "British Virgin Is." ? 'selected' : '' }}>British Virgin Is.</option>
                                            <option value="Brunei" {{ $shipment->origin_field == "Brunei" ? 'selected' : '' }}>Brunei</option>
                                            <option value="Bulgaria" {{ $shipment->origin_field == "Bulgaria" ? 'selected' : '' }}>Bulgaria</option>
                                            <option value="Burkina Faso" {{ $shipment->origin_field == "Burkina Faso" ? 'selected' : '' }}>Burkina Faso</option>
                                            <option value="Burma" {{ $shipment->origin_field == "Burma" ? 'selected' : '' }}>Burma</option>
                                            <option value="Burundi" {{ $shipment->origin_field == "Burundi" ? 'selected' : '' }}>Burundi</option>
                                            <option value="Cambodia" {{ $shipment->origin_field == "Cambodia" ? 'selected' : '' }}>Cambodia</option>
                                            <option value="Cameroon" {{ $shipment->origin_field == "Cameroon" ? 'selected' : '' }}>Cameroon</option>
                                            <option value="Canada" {{ $shipment->origin_field == "Canada" ? 'selected' : '' }}>Canada</option>
                                            <option value="Cape Verde" {{ $shipment->origin_field == "Cape Verde" ? 'selected' : '' }}>Cape Verde</option>
                                            <option value="Cayman Islands" {{ $shipment->origin_field == "Cayman Islands" ? 'selected' : '' }}>Cayman Islands</option>
                                            <option value="Central African Rep." {{ $shipment->origin_field == "Central African Rep." ? 'selected' : '' }}>Central African Rep.</option>
                                            <option value="Chad" {{ $shipment->origin_field == "Chad" ? 'selected' : '' }}>Chad</option>
                                            <option value="Chile" {{ $shipment->origin_field == "Chile" ? 'selected' : '' }}>Chile</option>
                                            <option value="China" {{ $shipment->origin_field == "China" ? 'selected' : '' }}>China</option>
                                            <option value="Colombia" {{ $shipment->origin_field == "Colombia" ? 'selected' : '' }}>Colombia</option>
                                            <option value="Comoros" {{ $shipment->origin_field == "Comoros" ? 'selected' : '' }}>Comoros</option>
                                            <option value="Congo" {{ $shipment->origin_field == "Congo" ? 'selected' : '' }}>Congo</option>
                                            <option value="Dem. Rep." {{ $shipment->origin_field == "Dem. Rep." ? 'selected' : '' }}>Dem. Rep.</option>
                                            <option value="Congo" {{ $shipment->origin_field == "Congo" ? 'selected' : '' }}>Congo</option>
                                            <option value="Repub. of the" {{ $shipment->origin_field == "Repub. of the" ? 'selected' : '' }}>Repub. of the</option>
                                            <option value="Cook Islands" {{ $shipment->origin_field == "Cook Islands" ? 'selected' : '' }}>Cook Islands</option>
                                            <option value="Costa Rica" {{ $shipment->origin_field == "Costa Rica" ? 'selected' : '' }}>Costa Rica</option>
                                            <option value="Cote d'Ivoire" {{ $shipment->origin_field == "Cote d'Ivoire" ? 'selected' : '' }}>Cote d'Ivoire</option>
                                            <option value="Croatia" {{ $shipment->origin_field == "Croatia" ? 'selected' : '' }}>Croatia</option>
                                            <option value="Cuba" {{ $shipment->origin_field == "Cuba" ? 'selected' : '' }}>Cuba</option>
                                            <option value="Cyprus" {{ $shipment->origin_field == "Cyprus" ? 'selected' : '' }}>Cyprus</option>
                                            <option value="Czech Republic" {{ $shipment->origin_field == "Czech Republic" ? 'selected' : '' }}>Czech Republic</option>
                                            <option value="Denmark" {{ $shipment->origin_field == "Denmark" ? 'selected' : '' }}>Denmark</option>
                                            <option value="Djibouti" {{ $shipment->origin_field == "Djibouti" ? 'selected' : '' }}>Djibouti</option>
                                            <option value="Dominica" {{ $shipment->origin_field == "Dominica" ? 'selected' : '' }}>Dominica</option>
                                            <option value="Dominican Republic" {{ $shipment->origin_field == "Dominican Republic" ? 'selected' : '' }}>Dominican Republic</option>
                                            <option value="East Timor" {{ $shipment->origin_field == "East Timor" ? 'selected' : '' }}>East Timor</option>
                                            <option value="Ecuador" {{ $shipment->origin_field == "Ecuador" ? 'selected' : '' }}>Ecuador</option>
                                            <option value="Egypt" {{ $shipment->origin_field == "Egypt" ? 'selected' : '' }}>Egypt</option>
                                            <option value="El Salvador" {{ $shipment->origin_field == "El Salvador" ? 'selected' : '' }}>El Salvador</option>
                                            <option value="Equatorial Guinea" {{ $shipment->origin_field == "Equatorial Guinea" ? 'selected' : '' }}>Equatorial Guinea</option>
                                            <option value="Eritrea" {{ $shipment->origin_field == "Eritrea" ? 'selected' : '' }}>Eritrea</option>
                                            <option value="Estonia" {{ $shipment->origin_field == "Estonia" ? 'selected' : '' }}>Estonia</option>
                                            <option value="Ethiopia" {{ $shipment->origin_field == "Ethiopia" ? 'selected' : '' }}>Ethiopia</option>
                                            <option value="Faroe Islands" {{ $shipment->origin_field == "Faroe Islands" ? 'selected' : '' }}>Faroe Islands</option>
                                            <option value="Fiji" {{ $shipment->origin_field == "Fiji" ? 'selected' : '' }}>Fiji</option>
                                            <option value="Finland" {{ $shipment->origin_field == "Finland" ? 'selected' : '' }}>Finland</option>
                                            <option value="France" {{ $shipment->origin_field == "France" ? 'selected' : '' }}>France</option>
                                            <option value="French Guiana" {{ $shipment->origin_field == "French Guiana" ? 'selected' : '' }}>French Guiana</option>
                                            <option value="French Polynesia" {{ $shipment->origin_field == "French Polynesia" ? 'selected' : '' }}>French Polynesia</option>
                                            <option value="Gabon" {{ $shipment->origin_field == "Gabon" ? 'selected' : '' }}>Gabon</option>
                                            <option value="Gambia" {{ $shipment->origin_field == "Gambia" ? 'selected' : '' }}>Gambia</option>
                                            <option value="Gaza Strip" {{ $shipment->origin_field == "Gaza Strip" ? 'selected' : '' }}>Gaza Strip</option>
                                            <option value="Georgia" {{ $shipment->origin_field == "Georgia" ? 'selected' : '' }}>Georgia</option>
                                            <option value="Germany" {{ $shipment->origin_field == "Germany" ? 'selected' : '' }}>Germany</option>
                                            <option value="Ghana" {{ $shipment->origin_field == "Ghana" ? 'selected' : '' }}>Ghana</option>
                                            <option value="Gibraltar" {{ $shipment->origin_field == "Gibraltar" ? 'selected' : '' }}>Gibraltar</option>
                                            <option value="Greece" {{ $shipment->origin_field == "Greece" ? 'selected' : '' }}>Greece</option>
                                            <option value="Greenland" {{ $shipment->origin_field == "Greenland" ? 'selected' : '' }}>Greenland</option>
                                            <option value="Grenada" {{ $shipment->origin_field == "Grenada" ? 'selected' : '' }}>Grenada</option>
                                            <option value="Guadeloupe" {{ $shipment->origin_field == "Guadeloupe" ? 'selected' : '' }}>Guadeloupe</option>
                                            <option value="Guam" {{ $shipment->origin_field == "Guam" ? 'selected' : '' }}>Guam</option>
                                            <option value="Guatemala" {{ $shipment->origin_field == "Guatemala" ? 'selected' : '' }}>Guatemala</option>
                                            <option value="Guernsey" {{ $shipment->origin_field == "Guernsey" ? 'selected' : '' }}>Guernsey</option>
                                            <option value="Guinea" {{ $shipment->origin_field == "Guinea" ? 'selected' : '' }}>Guinea</option>
                                            <option value="Guinea-Bissau" {{ $shipment->origin_field == "Guinea-Bissau" ? 'selected' : '' }}>Guinea-Bissau</option>
                                            <option value="Guyana" {{ $shipment->origin_field == "Guyana" ? 'selected' : '' }}>Guyana</option>
                                            <option value="Haiti" {{ $shipment->origin_field == "Haiti" ? 'selected' : '' }}>Haiti</option>
                                            <option value="Honduras" {{ $shipment->origin_field == "Honduras" ? 'selected' : '' }}>Honduras</option>
                                            <option value="Hong Kong" {{ $shipment->origin_field == "Hong Kong" ? 'selected' : '' }}>Hong Kong</option>
                                            <option value="Hungary" {{ $shipment->origin_field == "Hungary" ? 'selected' : '' }}>Hungary</option>
                                            <option value="Iceland" {{ $shipment->origin_field == "Iceland" ? 'selected' : '' }}>Iceland</option>
                                            <option value="India" {{ $shipment->origin_field == "India" ? 'selected' : '' }}>India</option>
                                            <option value="Indonesia" {{ $shipment->origin_field == "Indonesia" ? 'selected' : '' }}>Indonesia</option>
                                            <option value="Iran" {{ $shipment->origin_field == "Iran" ? 'selected' : '' }}>Iran</option>
                                            <option value="Iraq" {{ $shipment->origin_field == "Iraq" ? 'selected' : '' }}>Iraq</option>
                                            <option value="Ireland" {{ $shipment->origin_field == "Ireland" ? 'selected' : '' }}>Ireland</option>
                                            <option value="Isle of Man" {{ $shipment->origin_field == "Isle of Man" ? 'selected' : '' }}>Isle of Man</option>
                                            <option value="Israel" {{ $shipment->origin_field == "Israel" ? 'selected' : '' }}>Israel</option>
                                            <option value="Italy" {{ $shipment->origin_field == "Italy" ? 'selected' : '' }}>Italy</option>
                                            <option value="Jamaica" {{ $shipment->origin_field == "Jamaica" ? 'selected' : '' }}>Jamaica</option>
                                            <option value="Japan" {{ $shipment->origin_field == "Japan" ? 'selected' : '' }}>Japan</option>
                                            <option value="Jersey" {{ $shipment->origin_field == "Jersey" ? 'selected' : '' }}>Jersey</option>
                                            <option value="Jordan" {{ $shipment->origin_field == "Jordan" ? 'selected' : '' }}>Jordan</option>
                                            <option value="Kazakhstan" {{ $shipment->origin_field == "Kazakhstan" ? 'selected' : '' }}>Kazakhstan</option>
                                            <option value="Kenya" {{ $shipment->origin_field == "Kenya" ? 'selected' : '' }}>Kenya</option>
                                            <option value="Kiribati" {{ $shipment->origin_field == "Kiribati" ? 'selected' : '' }}>Kiribati</option>
                                            <option value="Korea" {{ $shipment->origin_field == "Korea" ? 'selected' : '' }}>Korea</option>
                                            <option value="North" {{ $shipment->origin_field == "North" ? 'selected' : '' }}>North</option>
                                            <option value="Korea" {{ $shipment->origin_field == "Korea" ? 'selected' : '' }}>Korea</option>
                                            <option value="South" {{ $shipment->origin_field == "South" ? 'selected' : '' }}>South</option>
                                            <option value="Kuwait" {{ $shipment->origin_field == "Kuwait" ? 'selected' : '' }}>Kuwait</option>
                                            <option value="Kyrgyzstan" {{ $shipment->origin_field == "Kyrgyzstan" ? 'selected' : '' }}>Kyrgyzstan</option>
                                            <option value="Laos" {{ $shipment->origin_field == "Laos" ? 'selected' : '' }}>Laos</option>
                                            <option value="Latvia" {{ $shipment->origin_field == "Latvia" ? 'selected' : '' }}>Latvia</option>
                                            <option value="Lebanon" {{ $shipment->origin_field == "Lebanon" ? 'selected' : '' }}>Lebanon</option>
                                            <option value="Lesotho" {{ $shipment->origin_field == "Lesotho" ? 'selected' : '' }}>Lesotho</option>
                                            <option value="Liberia" {{ $shipment->origin_field == "Liberia" ? 'selected' : '' }}>Liberia</option>
                                            <option value="Libya" {{ $shipment->origin_field == "Libya" ? 'selected' : '' }}>Libya</option>
                                            <option value="Liechtenstein" {{ $shipment->origin_field == "Liechtenstein" ? 'selected' : '' }}>Liechtenstein</option>
                                            <option value="Lithuania" {{ $shipment->origin_field == "Lithuania" ? 'selected' : '' }}>Lithuania</option>
                                            <option value="Luxembourg" {{ $shipment->origin_field == "" ? 'selected' : '' }}>Luxembourg</option>
                                            <option value="Macau" {{ $shipment->origin_field == "Luxembourg" ? 'selected' : '' }}>Macau</option>
                                            <option value="Macedonia" {{ $shipment->origin_field == "Macedonia" ? 'selected' : '' }}>Macedonia</option>
                                            <option value="Madagascar" {{ $shipment->origin_field == "Madagascar" ? 'selected' : '' }}>Madagascar</option>
                                            <option value="Malawi" {{ $shipment->origin_field == "Malawi" ? 'selected' : '' }}>Malawi</option>
                                            <option value="Malaysia" {{ $shipment->origin_field == "Malaysia" ? 'selected' : '' }}>Malaysia</option>
                                            <option value="Maldives" {{ $shipment->origin_field == "Maldives" ? 'selected' : '' }}>Maldives</option>
                                            <option value="Mali" {{ $shipment->origin_field == "Mali" ? 'selected' : '' }}>Mali</option>
                                            <option value="Malta" {{ $shipment->origin_field == "Malta" ? 'selected' : '' }}>Malta</option>
                                            <option value="Marshall Islands" {{ $shipment->origin_field == "Marshall Islands" ? 'selected' : '' }}>Marshall Islands</option>
                                            <option value="Martinique" {{ $shipment->origin_field == "Martinique" ? 'selected' : '' }}>Martinique</option>
                                            <option value="Mauritania" {{ $shipment->origin_field == "Mauritania" ? 'selected' : '' }}>Mauritania</option>
                                            <option value="Mauritius" {{ $shipment->origin_field == "Mauritius" ? 'selected' : '' }}>Mauritius</option>
                                            <option value="Mayotte" {{ $shipment->origin_field == "Mayotte" ? 'selected' : '' }}>Mayotte</option>
                                            <option value="Mexico" {{ $shipment->origin_field == "Mexico" ? 'selected' : '' }}>Mexico</option>
                                            <option value="Micronesia" {{ $shipment->origin_field == "Micronesia" ? 'selected' : '' }}>Micronesia</option>
                                            <option value="Fed. St." {{ $shipment->origin_field == "Fed. St." ? 'selected' : '' }}>Fed. St.</option>
                                            <option value="Moldova" {{ $shipment->origin_field == "Moldova" ? 'selected' : '' }}>Moldova</option>
                                            <option value="Monaco" {{ $shipment->origin_field == "Monaco" ? 'selected' : '' }}>Monaco</option>
                                            <option value="Mongolia" {{ $shipment->origin_field == "Mongolia" ? 'selected' : '' }}>Mongolia</option>
                                            <option value="Montserrat" {{ $shipment->origin_field == "Montserrat" ? 'selected' : '' }}>Montserrat</option>
                                            <option value="Morocco" {{ $shipment->origin_field == "Morocco" ? 'selected' : '' }}>Morocco</option>
                                            <option value="Mozambique" {{ $shipment->origin_field == "Mozambique" ? 'selected' : '' }}>Mozambique</option>
                                            <option value="Namibia" {{ $shipment->origin_field == "Namibia" ? 'selected' : '' }}>Namibia</option>
                                            <option value="Nauru" {{ $shipment->origin_field == "Nauru" ? 'selected' : '' }}>Nauru</option>
                                            <option value="Nepal" {{ $shipment->origin_field == "Nepal" ? 'selected' : '' }}>Nepal</option>
                                            <option value="Netherlands" {{ $shipment->origin_field == "Netherlands" ? 'selected' : '' }}>Netherlands</option>
                                            <option value="Netherlands Antilles" {{ $shipment->origin_field == "Netherlands Antilles" ? 'selected' : '' }}>Netherlands Antilles</option>
                                            <option value="New Caledonia" {{ $shipment->origin_field == "New Caledonia" ? 'selected' : '' }}>New Caledonia</option>
                                            <option value="New Zealand" {{ $shipment->origin_field == "New Zealand" ? 'selected' : '' }}>New Zealand</option>
                                            <option value="Nicaragua" {{ $shipment->origin_field == "Nicaragua" ? 'selected' : '' }}>Nicaragua</option>
                                            <option value="Niger" {{ $shipment->origin_field == "Niger" ? 'selected' : '' }}>Niger</option>
                                            <option value="Nigeria" {{ $shipment->origin_field == "Nigeria" ? 'selected' : '' }}>Nigeria</option>
                                            <option value="N. Mariana Islands" {{ $shipment->origin_field == "N. Mariana Islands" ? 'selected' : '' }}>N. Mariana Islands</option>
                                            <option value="Norway" {{ $shipment->origin_field == "Norway" ? 'selected' : '' }}>Norway</option>
                                            <option value="Oman" {{ $shipment->origin_field == "Oman" ? 'selected' : '' }}>Oman</option>
                                            <option value="Pakistan" {{ $shipment->origin_field == "Pakistan" ? 'selected' : '' }}>Pakistan</option>
                                            <option value="Palau" {{ $shipment->origin_field == "Palau" ? 'selected' : '' }}>Palau</option>
                                            <option value="Panama" {{ $shipment->origin_field == "Panama" ? 'selected' : '' }}>Panama</option>
                                            <option value="Papua New Guinea" {{ $shipment->origin_field == "Papua New Guinea" ? 'selected' : '' }}>Papua New Guinea</option>
                                            <option value="Paraguay" {{ $shipment->origin_field == "Paraguay" ? 'selected' : '' }}>Paraguay</option>
                                            <option value="Peru" {{ $shipment->origin_field == "Peru" ? 'selected' : '' }}>Peru</option>
                                            <option value="Philippines" {{ $shipment->origin_field == "Philippines" ? 'selected' : '' }}>Philippines</option>
                                            <option value="Poland" {{ $shipment->origin_field == "Poland" ? 'selected' : '' }}>Poland</option>
                                            <option value="Portugal" {{ $shipment->origin_field == "Portugal" ? 'selected' : '' }}>Portugal</option>
                                            <option value="Puerto Rico" {{ $shipment->origin_field == "Puerto Rico" ? 'selected' : '' }}>Puerto Rico</option>
                                            <option value="Qatar" {{ $shipment->origin_field == "Qatar" ? 'selected' : '' }}>Qatar</option>
                                            <option value="Reunion" {{ $shipment->origin_field == "Reunion" ? 'selected' : '' }}>Reunion</option>
                                            <option value="Romania" {{ $shipment->origin_field == "Romania" ? 'selected' : '' }}>Romania</option>
                                            <option value="Russia" {{ $shipment->origin_field == "Russia" ? 'selected' : '' }}>Russia</option>
                                            <option value="Rwanda" {{ $shipment->origin_field == "Rwanda" ? 'selected' : '' }}>Rwanda</option>
                                            <option value="Saint Helena" {{ $shipment->origin_field == "Saint Helena" ? 'selected' : '' }}>Saint Helena</option>
                                            <option value="Saint Kitts &amp; Nevis" {{ $shipment->origin_field == "Saint Kitts & Nevis" ? 'selected' : '' }}>Saint Kitts &amp; Nevis</option>
                                            <option value="Saint Lucia" {{ $shipment->origin_field == "Saint Lucia" ? 'selected' : '' }}>Saint Lucia</option>
                                            <option value="St Pierre &amp; Miquelon" {{ $shipment->origin_field == "St Pierre & Miquelon" ? 'selected' : '' }}>St Pierre &amp; Miquelon</option>
                                            <option value="Saint Vincent and the Grenadines" {{ $shipment->origin_field == "Saint Vincent and the Grenadines" ? 'selected' : '' }}>Saint Vincent and the
                                                Grenadines</option>
                                            <option value="Samoa" {{ $shipment->origin_field == "Samoa" ? 'selected' : '' }}>Samoa</option>
                                            <option value="San Marino" {{ $shipment->origin_field == "San Marino" ? 'selected' : '' }}>San Marino</option>
                                            <option value="Sao Tome &amp; Principe" {{ $shipment->origin_field == "Sao Tome & Principe" ? 'selected' : '' }}>Sao Tome &amp; Principe</option>
                                            <option value="Saudi Arabia" {{ $shipment->origin_field == "Saudi Arabia" ? 'selected' : '' }}>Saudi Arabia</option>
                                            <option value="Senegal" {{ $shipment->origin_field == "Senegal" ? 'selected' : '' }}>Senegal</option>
                                            <option value="Serbia" {{ $shipment->origin_field == "Serbia" ? 'selected' : '' }}>Serbia</option>
                                            <option value="Seychelles" {{ $shipment->origin_field == "Seychelles" ? 'selected' : '' }}>Seychelles</option>
                                            <option value="Sierra Leone" {{ $shipment->origin_field == "Sierra Leone" ? 'selected' : '' }}>Sierra Leone</option>
                                            <option value="Singapore" {{ $shipment->origin_field == "Singapore" ? 'selected' : '' }}>Singapore</option>
                                            <option value="Slovakia" {{ $shipment->origin_field == "Slovakia" ? 'selected' : '' }}>Slovakia</option>
                                            <option value="Slovenia" {{ $shipment->origin_field == "Slovenia" ? 'selected' : '' }}>Slovenia</option>
                                            <option value="Solomon Islands" {{ $shipment->origin_field == "Solomon Islands" ? 'selected' : '' }}>Solomon Islands</option>
                                            <option value="Somalia" {{ $shipment->origin_field == "Somalia" ? 'selected' : '' }}>Somalia</option>
                                            <option value="South Africa" {{ $shipment->origin_field == "South Africa" ? 'selected' : '' }}>South Africa</option>
                                            <option value="Spain" {{ $shipment->origin_field == "Spain" ? 'selected' : '' }}>Spain</option>
                                            <option value="Sri Lanka" {{ $shipment->origin_field == "Sri Lanka" ? 'selected' : '' }}>Sri Lanka</option>
                                            <option value="Sudan" {{ $shipment->origin_field == "Sudan" ? 'selected' : '' }}>Sudan</option>
                                            <option value="Suriname" {{ $shipment->origin_field == "Suriname" ? 'selected' : '' }}>Suriname</option>
                                            <option value="Swaziland" {{ $shipment->origin_field == "Swaziland" ? 'selected' : '' }}>Swaziland</option>
                                            <option value="Sweden" {{ $shipment->origin_field == "Sweden" ? 'selected' : '' }}>Sweden</option>
                                            <option value="Switzerland" {{ $shipment->origin_field == "Switzerland" ? 'selected' : '' }}>Switzerland</option>
                                            <option value="Syria" {{ $shipment->origin_field == "Syria" ? 'selected' : '' }}>Syria</option>
                                            <option value="Taiwan" {{ $shipment->origin_field == "Taiwan" ? 'selected' : '' }}>Taiwan</option>
                                            <option value="Tajikistan" {{ $shipment->origin_field == "Tajikistan" ? 'selected' : '' }}>Tajikistan</option>
                                            <option value="Tanzania" {{ $shipment->origin_field == "Tanzania" ? 'selected' : '' }}>Tanzania</option>
                                            <option value="Thailand" {{ $shipment->origin_field == "Thailand" ? 'selected' : '' }}>Thailand</option>
                                            <option value="Togo" {{ $shipment->origin_field == "Togo" ? 'selected' : '' }}>Togo</option>
                                            <option value="Tonga" {{ $shipment->origin_field == "Tonga" ? 'selected' : '' }}>Tonga</option>
                                            <option value="Trinidad &amp; Tobago" {{ $shipment->origin_field == "Trinidad & Tobago" ? 'selected' : '' }}>Trinidad &amp; Tobago</option>
                                            <option value="Tunisia" {{ $shipment->origin_field == "Tunisia" ? 'selected' : '' }}>Tunisia</option>
                                            <option value="Turkey" {{ $shipment->origin_field == "Turkey" ? 'selected' : '' }}>Turkey</option>
                                            <option value="Turkmenistan" {{ $shipment->origin_field == "Turkmenistan" ? 'selected' : '' }}>Turkmenistan</option>
                                            <option value="Turks &amp; Caicos Is" {{ $shipment->origin_field == "Turks & Caicos Is" ? 'selected' : '' }}>Turks &amp; Caicos Is</option>
                                            <option value="Tuvalu" {{ $shipment->origin_field == "Tuvalu" ? 'selected' : '' }}>Tuvalu</option>
                                            <option value="Uganda" {{ $shipment->origin_field == "Uganda" ? 'selected' : '' }}>Uganda</option>
                                            <option value="Ukraine" {{ $shipment->origin_field == "Ukraine" ? 'selected' : '' }}>Ukraine</option>
                                            <option value="United Arab Emirates" {{ $shipment->origin_field == "United Arab Emirates" ? 'selected' : '' }}>United Arab Emirates</option>
                                            <option value="United Kingdom" {{ $shipment->origin_field == "United Kingdom" ? 'selected' : '' }}>United Kingdom</option>
                                            <option value="United States" {{ $shipment->origin_field == "United States" ? 'selected' : '' }}>United States</option>
                                            <option value="Uruguay" {{ $shipment->origin_field == "Uruguay" ? 'selected' : '' }}>Uruguay</option>
                                            <option value="Uzbekistan" {{ $shipment->origin_field == "Uzbekistan" ? 'selected' : '' }}>Uzbekistan</option>
                                            <option value="Vanuatu" {{ $shipment->origin_field == "Vanuatu" ? 'selected' : '' }}>Vanuatu</option>
                                            <option value="Venezuela" {{ $shipment->origin_field == "Venezuela" ? 'selected' : '' }}>Venezuela</option>
                                            <option value="Vietnam" {{ $shipment->origin_field == "Vietnam" ? 'selected' : '' }}>Vietnam</option>
                                            <option value="Virgin Islands" {{ $shipment->origin_field == "Virgin Islands" ? 'selected' : '' }}>Virgin Islands</option>
                                            <option value="Wallis and Futuna" {{ $shipment->origin_field == "Wallis and Futuna" ? 'selected' : '' }}>Wallis and Futuna</option>
                                            <option value="West Bank" {{ $shipment->origin_field == "West Bank" ? 'selected' : '' }}>West Bank</option>
                                            <option value="Western Sahara" {{ $shipment->origin_field == "Western Sahara" ? 'selected' : '' }}>Western Sahara</option>
                                            <option value="Yemen" {{ $shipment->origin_field == "Yemen" ? 'selected' : '' }}>Yemen</option>
                                            <option value="Zambia" {{ $shipment->origin_field == "Zambia" ? 'selected' : '' }}>Zambia</option>
                                            <option value="Zimbabwe" {{ $shipment->origin_field == "Zimbabwe" ? 'selected' : '' }}>Zimbabwe</option>
                                        </select>

                                    </div>
                                    <div class="btn-box mt-2">
                                        <label for="choices-multiple" class="form-label">{{__('Destination') }}</label>
                                        <select class="form-control select" id="choices-multiple" name="destination">
                                            <option value="">-- Select One --</option>
                                            <option value="Afghanistan" {{ $shipment->destination == "Afghanistan" ? 'selected' : '' }}>Afghanistan</option>
                                            <option value="Albania" {{ $shipment->destination == " Albania" ? 'selected' : '' }}>Albania</option>
                                            <option value="Algeria" {{ $shipment->destination == "Algeria" ? 'selected' : '' }}>Algeria</option>
                                            <option value="American Samoa"  {{ $shipment->destination == "American Samoa" ? 'selected' : '' }}>American Samoa</option>
                                            <option value="Andorra"   {{ $shipment->destination == "Andorra" ? 'selected' : '' }}>Andorra</option>
                                            <option value="Angola" {{ $shipment->destination == "Angola" ? 'selected' : '' }}>Angola</option>
                                            <option value="Anguilla"  {{ $shipment->destination == "Anguilla" ? 'selected' : '' }}>Anguilla</option>
                                            <option value="Antigua &amp; Barbuda"   {{ $shipment->destination == "Antigua & Barbuda" ? 'selected' : '' }}>Antigua &amp; Barbuda</option>
                                            <option value="Argentina"   {{ $shipment->destination == "Argentina" ? 'selected' : '' }}>Argentina</option>
                                            <option value="Armenia"   {{ $shipment->destination == "Armenia" ? 'selected' : '' }}>Armenia</option>
                                            <option value="Aruba"   {{ $shipment->destination == "Aruba " ? 'selected' : '' }}>Aruba</option>
                                            <option value="Australia" {{ $shipment->destination == "Australia" ? 'selected' : '' }}>Australia</option>
                                            <option value="Austria" {{ $shipment->destination == "Austria" ? 'selected' : '' }}>Austria</option>
                                            <option value="Azerbaijan" {{ $shipment->destination == "Azerbaijan" ? 'selected' : '' }}>Azerbaijan</option>
                                            <option value="Bahamas" {{ $shipment->destination == "Bahamas" ? 'selected' : '' }}>Bahamas</option>
                                            <option value="Bahrain" {{ $shipment->destination == "Bahrain" ? 'selected' : '' }}>Bahrain</option>
                                            <option value="Bangladesh" {{ $shipment->destination == "Bangladesh" ? 'selected' : '' }}>Bangladesh</option>
                                            <option value="Barbados" {{ $shipment->destination == "Barbados" ? 'selected' : '' }}>Barbados</option>
                                            <option value="Belarus" {{ $shipment->destination == "Belarus" ? 'selected' : '' }}>Belarus</option>
                                            <option value="Belgium" {{ $shipment->destination == "Belgium" ? 'selected' : '' }}>Belgium</option>
                                            <option value="Belize" {{ $shipment->destination == "Belize" ? 'selected' : '' }}>Belize</option>
                                            <option value="Benin" {{ $shipment->destination == "Benin" ? 'selected' : '' }}>Benin</option>
                                            <option value="Bermuda" {{ $shipment->destination == "Bermuda" ? 'selected' : '' }}>Bermuda</option>
                                            <option value="Bhutan" {{ $shipment->destination == "Bhutan" ? 'selected' : '' }}>Bhutan</option>
                                            <option value="Bolivia" {{ $shipment->destination == "Bolivia" ? 'selected' : '' }}>Bolivia</option>
                                            <option value="Bosnia &amp; Herzegovina" {{ $shipment->destination == "Bosnia & Herzegovina" ? 'selected' : '' }}>Bosnia &amp; Herzegovina</option>
                                            <option value="Botswana" {{ $shipment->destination == "Botswana" ? 'selected' : '' }}>Botswana</option>
                                            <option value="Brazil" {{ $shipment->destination == "Brazil" ? 'selected' : '' }}>Brazil</option>
                                            <option value="British Virgin Is." {{ $shipment->destination == "British Virgin Is." ? 'selected' : '' }}>British Virgin Is.</option>
                                            <option value="Brunei" {{ $shipment->destination == "Brunei" ? 'selected' : '' }}>Brunei</option>
                                            <option value="Bulgaria" {{ $shipment->destination == "Bulgaria" ? 'selected' : '' }}>Bulgaria</option>
                                            <option value="Burkina Faso" {{ $shipment->destination == "Burkina Faso" ? 'selected' : '' }}>Burkina Faso</option>
                                            <option value="Burma" {{ $shipment->destination == "Burma" ? 'selected' : '' }}>Burma</option>
                                            <option value="Burundi" {{ $shipment->destination == "Burundi" ? 'selected' : '' }}>Burundi</option>
                                            <option value="Cambodia" {{ $shipment->destination == "Cambodia" ? 'selected' : '' }}>Cambodia</option>
                                            <option value="Cameroon" {{ $shipment->destination == "Cameroon" ? 'selected' : '' }}>Cameroon</option>
                                            <option value="Canada" {{ $shipment->destination == "Canada" ? 'selected' : '' }}>Canada</option>
                                            <option value="Cape Verde" {{ $shipment->destination == "Cape Verde" ? 'selected' : '' }}>Cape Verde</option>
                                            <option value="Cayman Islands" {{ $shipment->destination == "Cayman Islands" ? 'selected' : '' }}>Cayman Islands</option>
                                            <option value="Central African Rep." {{ $shipment->destination == "Central African Rep." ? 'selected' : '' }}>Central African Rep.</option>
                                            <option value="Chad" {{ $shipment->destination == "Chad" ? 'selected' : '' }}>Chad</option>
                                            <option value="Chile" {{ $shipment->destination == "Chile" ? 'selected' : '' }}>Chile</option>
                                            <option value="China" {{ $shipment->destination == "China" ? 'selected' : '' }}>China</option>
                                            <option value="Colombia" {{ $shipment->destination == "Colombia" ? 'selected' : '' }}>Colombia</option>
                                            <option value="Comoros" {{ $shipment->destination == "Comoros" ? 'selected' : '' }}>Comoros</option>
                                            <option value="Congo" {{ $shipment->destination == "Congo" ? 'selected' : '' }}>Congo</option>
                                            <option value="Dem. Rep." {{ $shipment->destination == "Dem. Rep." ? 'selected' : '' }}>Dem. Rep.</option>
                                            <option value="Congo" {{ $shipment->destination == "Congo" ? 'selected' : '' }}>Congo</option>
                                            <option value="Repub. of the" {{ $shipment->destination == "Repub. of the" ? 'selected' : '' }}>Repub. of the</option>
                                            <option value="Cook Islands" {{ $shipment->destination == "Cook Islands" ? 'selected' : '' }}>Cook Islands</option>
                                            <option value="Costa Rica" {{ $shipment->destination == "Costa Rica" ? 'selected' : '' }}>Costa Rica</option>
                                            <option value="Cote d'Ivoire" {{ $shipment->destination == "Cote d'Ivoire" ? 'selected' : '' }}>Cote d'Ivoire</option>
                                            <option value="Croatia" {{ $shipment->destination == "Croatia" ? 'selected' : '' }}>Croatia</option>
                                            <option value="Cuba" {{ $shipment->destination == "Cuba" ? 'selected' : '' }}>Cuba</option>
                                            <option value="Cyprus" {{ $shipment->destination == "Cyprus" ? 'selected' : '' }}>Cyprus</option>
                                            <option value="Czech Republic" {{ $shipment->destination == "Czech Republic" ? 'selected' : '' }}>Czech Republic</option>
                                            <option value="Denmark" {{ $shipment->destination == "Denmark" ? 'selected' : '' }}>Denmark</option>
                                            <option value="Djibouti" {{ $shipment->destination == "Djibouti" ? 'selected' : '' }}>Djibouti</option>
                                            <option value="Dominica" {{ $shipment->destination == "Dominica" ? 'selected' : '' }}>Dominica</option>
                                            <option value="Dominican Republic" {{ $shipment->destination == "Dominican Republic" ? 'selected' : '' }}>Dominican Republic</option>
                                            <option value="East Timor" {{ $shipment->destination == "East Timor" ? 'selected' : '' }}>East Timor</option>
                                            <option value="Ecuador" {{ $shipment->destination == "Ecuador" ? 'selected' : '' }}>Ecuador</option>
                                            <option value="Egypt" {{ $shipment->destination == "Egypt" ? 'selected' : '' }}>Egypt</option>
                                            <option value="El Salvador" {{ $shipment->destination == "El Salvador" ? 'selected' : '' }}>El Salvador</option>
                                            <option value="Equatorial Guinea" {{ $shipment->destination == "Equatorial Guinea" ? 'selected' : '' }}>Equatorial Guinea</option>
                                            <option value="Eritrea" {{ $shipment->destination == "Eritrea" ? 'selected' : '' }}>Eritrea</option>
                                            <option value="Estonia" {{ $shipment->destination == "Estonia" ? 'selected' : '' }}>Estonia</option>
                                            <option value="Ethiopia" {{ $shipment->destination == "Ethiopia" ? 'selected' : '' }}>Ethiopia</option>
                                            <option value="Faroe Islands" {{ $shipment->destination == "Faroe Islands" ? 'selected' : '' }}>Faroe Islands</option>
                                            <option value="Fiji" {{ $shipment->destination == "Fiji" ? 'selected' : '' }}>Fiji</option>
                                            <option value="Finland" {{ $shipment->destination == "Finland" ? 'selected' : '' }}>Finland</option>
                                            <option value="France" {{ $shipment->destination == "France" ? 'selected' : '' }}>France</option>
                                            <option value="French Guiana" {{ $shipment->destination == "French Guiana" ? 'selected' : '' }}>French Guiana</option>
                                            <option value="French Polynesia" {{ $shipment->destination == "French Polynesia" ? 'selected' : '' }}>French Polynesia</option>
                                            <option value="Gabon" {{ $shipment->destination == "Gabon" ? 'selected' : '' }}>Gabon</option>
                                            <option value="Gambia" {{ $shipment->destination == "Gambia" ? 'selected' : '' }}>Gambia</option>
                                            <option value="Gaza Strip" {{ $shipment->destination == "Gaza Strip" ? 'selected' : '' }}>Gaza Strip</option>
                                            <option value="Georgia" {{ $shipment->destination == "Georgia" ? 'selected' : '' }}>Georgia</option>
                                            <option value="Germany" {{ $shipment->destination == "Germany" ? 'selected' : '' }}>Germany</option>
                                            <option value="Ghana" {{ $shipment->destination == "Ghana" ? 'selected' : '' }}>Ghana</option>
                                            <option value="Gibraltar" {{ $shipment->destination == "Gibraltar" ? 'selected' : '' }}>Gibraltar</option>
                                            <option value="Greece" {{ $shipment->destination == "Greece" ? 'selected' : '' }}>Greece</option>
                                            <option value="Greenland" {{ $shipment->destination == "Greenland" ? 'selected' : '' }}>Greenland</option>
                                            <option value="Grenada" {{ $shipment->destination == "Grenada" ? 'selected' : '' }}>Grenada</option>
                                            <option value="Guadeloupe" {{ $shipment->destination == "Guadeloupe" ? 'selected' : '' }}>Guadeloupe</option>
                                            <option value="Guam" {{ $shipment->destination == "Guam" ? 'selected' : '' }}>Guam</option>
                                            <option value="Guatemala" {{ $shipment->destination == "Guatemala" ? 'selected' : '' }}>Guatemala</option>
                                            <option value="Guernsey" {{ $shipment->destination == "Guernsey" ? 'selected' : '' }}>Guernsey</option>
                                            <option value="Guinea" {{ $shipment->destination == "Guinea" ? 'selected' : '' }}>Guinea</option>
                                            <option value="Guinea-Bissau" {{ $shipment->destination == "Guinea-Bissau" ? 'selected' : '' }}>Guinea-Bissau</option>
                                            <option value="Guyana" {{ $shipment->destination == "Guyana" ? 'selected' : '' }}>Guyana</option>
                                            <option value="Haiti" {{ $shipment->destination == "Haiti" ? 'selected' : '' }}>Haiti</option>
                                            <option value="Honduras" {{ $shipment->destination == "Honduras" ? 'selected' : '' }}>Honduras</option>
                                            <option value="Hong Kong" {{ $shipment->destination == "Hong Kong" ? 'selected' : '' }}>Hong Kong</option>
                                            <option value="Hungary" {{ $shipment->destination == "Hungary" ? 'selected' : '' }}>Hungary</option>
                                            <option value="Iceland" {{ $shipment->destination == "Iceland" ? 'selected' : '' }}>Iceland</option>
                                            <option value="India" {{ $shipment->destination == "India" ? 'selected' : '' }}>India</option>
                                            <option value="Indonesia" {{ $shipment->destination == "Indonesia" ? 'selected' : '' }}>Indonesia</option>
                                            <option value="Iran" {{ $shipment->destination == "Iran" ? 'selected' : '' }}>Iran</option>
                                            <option value="Iraq" {{ $shipment->destination == "Iraq" ? 'selected' : '' }}>Iraq</option>
                                            <option value="Ireland" {{ $shipment->destination == "Ireland" ? 'selected' : '' }}>Ireland</option>
                                            <option value="Isle of Man" {{ $shipment->destination == "Isle of Man" ? 'selected' : '' }}>Isle of Man</option>
                                            <option value="Israel" {{ $shipment->destination == "Israel" ? 'selected' : '' }}>Israel</option>
                                            <option value="Italy" {{ $shipment->destination == "Italy" ? 'selected' : '' }}>Italy</option>
                                            <option value="Jamaica" {{ $shipment->destination == "Jamaica" ? 'selected' : '' }}>Jamaica</option>
                                            <option value="Japan" {{ $shipment->destination == "Japan" ? 'selected' : '' }}>Japan</option>
                                            <option value="Jersey" {{ $shipment->destination == "Jersey" ? 'selected' : '' }}>Jersey</option>
                                            <option value="Jordan" {{ $shipment->destination == "Jordan" ? 'selected' : '' }}>Jordan</option>
                                            <option value="Kazakhstan" {{ $shipment->destination == "Kazakhstan" ? 'selected' : '' }}>Kazakhstan</option>
                                            <option value="Kenya" {{ $shipment->destination == "Kenya" ? 'selected' : '' }}>Kenya</option>
                                            <option value="Kiribati" {{ $shipment->destination == "Kiribati" ? 'selected' : '' }}>Kiribati</option>
                                            <option value="Korea" {{ $shipment->destination == "Korea" ? 'selected' : '' }}>Korea</option>
                                            <option value="North" {{ $shipment->destination == "North" ? 'selected' : '' }}>North</option>
                                            <option value="Korea" {{ $shipment->destination == "Korea" ? 'selected' : '' }}>Korea</option>
                                            <option value="South" {{ $shipment->destination == "South" ? 'selected' : '' }}>South</option>
                                            <option value="Kuwait" {{ $shipment->destination == "Kuwait" ? 'selected' : '' }}>Kuwait</option>
                                            <option value="Kyrgyzstan" {{ $shipment->destination == "Kyrgyzstan" ? 'selected' : '' }}>Kyrgyzstan</option>
                                            <option value="Laos" {{ $shipment->destination == "Laos" ? 'selected' : '' }}>Laos</option>
                                            <option value="Latvia" {{ $shipment->destination == "Latvia" ? 'selected' : '' }}>Latvia</option>
                                            <option value="Lebanon" {{ $shipment->destination == "Lebanon" ? 'selected' : '' }}>Lebanon</option>
                                            <option value="Lesotho" {{ $shipment->destination == "Lesotho" ? 'selected' : '' }}>Lesotho</option>
                                            <option value="Liberia" {{ $shipment->destination == "Liberia" ? 'selected' : '' }}>Liberia</option>
                                            <option value="Libya" {{ $shipment->destination == "Libya" ? 'selected' : '' }}>Libya</option>
                                            <option value="Liechtenstein" {{ $shipment->destination == "Liechtenstein" ? 'selected' : '' }}>Liechtenstein</option>
                                            <option value="Lithuania" {{ $shipment->destination == "Lithuania" ? 'selected' : '' }}>Lithuania</option>
                                            <option value="Luxembourg" {{ $shipment->destination == "" ? 'selected' : '' }}>Luxembourg</option>
                                            <option value="Macau" {{ $shipment->destination == "Luxembourg" ? 'selected' : '' }}>Macau</option>
                                            <option value="Macedonia" {{ $shipment->destination == "Macedonia" ? 'selected' : '' }}>Macedonia</option>
                                            <option value="Madagascar" {{ $shipment->destination == "Madagascar" ? 'selected' : '' }}>Madagascar</option>
                                            <option value="Malawi" {{ $shipment->destination == "Malawi" ? 'selected' : '' }}>Malawi</option>
                                            <option value="Malaysia" {{ $shipment->destination == "Malaysia" ? 'selected' : '' }}>Malaysia</option>
                                            <option value="Maldives" {{ $shipment->destination == "Maldives" ? 'selected' : '' }}>Maldives</option>
                                            <option value="Mali" {{ $shipment->destination == "Mali" ? 'selected' : '' }}>Mali</option>
                                            <option value="Malta" {{ $shipment->destination == "Malta" ? 'selected' : '' }}>Malta</option>
                                            <option value="Marshall Islands" {{ $shipment->destination == "Marshall Islands" ? 'selected' : '' }}>Marshall Islands</option>
                                            <option value="Martinique" {{ $shipment->destination == "Martinique" ? 'selected' : '' }}>Martinique</option>
                                            <option value="Mauritania" {{ $shipment->destination == "Mauritania" ? 'selected' : '' }}>Mauritania</option>
                                            <option value="Mauritius" {{ $shipment->destination == "Mauritius" ? 'selected' : '' }}>Mauritius</option>
                                            <option value="Mayotte" {{ $shipment->destination == "Mayotte" ? 'selected' : '' }}>Mayotte</option>
                                            <option value="Mexico" {{ $shipment->destination == "Mexico" ? 'selected' : '' }}>Mexico</option>
                                            <option value="Micronesia" {{ $shipment->destination == "Micronesia" ? 'selected' : '' }}>Micronesia</option>
                                            <option value="Fed. St." {{ $shipment->destination == "Fed. St." ? 'selected' : '' }}>Fed. St.</option>
                                            <option value="Moldova" {{ $shipment->destination == "Moldova" ? 'selected' : '' }}>Moldova</option>
                                            <option value="Monaco" {{ $shipment->destination == "Monaco" ? 'selected' : '' }}>Monaco</option>
                                            <option value="Mongolia" {{ $shipment->destination == "Mongolia" ? 'selected' : '' }}>Mongolia</option>
                                            <option value="Montserrat" {{ $shipment->destination == "Montserrat" ? 'selected' : '' }}>Montserrat</option>
                                            <option value="Morocco" {{ $shipment->destination == "Morocco" ? 'selected' : '' }}>Morocco</option>
                                            <option value="Mozambique" {{ $shipment->destination == "Mozambique" ? 'selected' : '' }}>Mozambique</option>
                                            <option value="Namibia" {{ $shipment->destination == "Namibia" ? 'selected' : '' }}>Namibia</option>
                                            <option value="Nauru" {{ $shipment->destination == "Nauru" ? 'selected' : '' }}>Nauru</option>
                                            <option value="Nepal" {{ $shipment->destination == "Nepal" ? 'selected' : '' }}>Nepal</option>
                                            <option value="Netherlands" {{ $shipment->destination == "Netherlands" ? 'selected' : '' }}>Netherlands</option>
                                            <option value="Netherlands Antilles" {{ $shipment->destination == "Netherlands Antilles" ? 'selected' : '' }}>Netherlands Antilles</option>
                                            <option value="New Caledonia" {{ $shipment->destination == "New Caledonia" ? 'selected' : '' }}>New Caledonia</option>
                                            <option value="New Zealand" {{ $shipment->destination == "New Zealand" ? 'selected' : '' }}>New Zealand</option>
                                            <option value="Nicaragua" {{ $shipment->destination == "Nicaragua" ? 'selected' : '' }}>Nicaragua</option>
                                            <option value="Niger" {{ $shipment->destination == "Niger" ? 'selected' : '' }}>Niger</option>
                                            <option value="Nigeria" {{ $shipment->destination == "Nigeria" ? 'selected' : '' }}>Nigeria</option>
                                            <option value="N. Mariana Islands" {{ $shipment->destination == "N. Mariana Islands" ? 'selected' : '' }}>N. Mariana Islands</option>
                                            <option value="Norway" {{ $shipment->destination == "Norway" ? 'selected' : '' }}>Norway</option>
                                            <option value="Oman" {{ $shipment->destination == "Oman" ? 'selected' : '' }}>Oman</option>
                                            <option value="Pakistan" {{ $shipment->destination == "Pakistan" ? 'selected' : '' }}>Pakistan</option>
                                            <option value="Palau" {{ $shipment->destination == "Palau" ? 'selected' : '' }}>Palau</option>
                                            <option value="Panama" {{ $shipment->destination == "Panama" ? 'selected' : '' }}>Panama</option>
                                            <option value="Papua New Guinea" {{ $shipment->destination == "Papua New Guinea" ? 'selected' : '' }}>Papua New Guinea</option>
                                            <option value="Paraguay" {{ $shipment->destination == "Paraguay" ? 'selected' : '' }}>Paraguay</option>
                                            <option value="Peru" {{ $shipment->destination == "Peru" ? 'selected' : '' }}>Peru</option>
                                            <option value="Philippines" {{ $shipment->destination == "Philippines" ? 'selected' : '' }}>Philippines</option>
                                            <option value="Poland" {{ $shipment->destination == "Poland" ? 'selected' : '' }}>Poland</option>
                                            <option value="Portugal" {{ $shipment->destination == "Portugal" ? 'selected' : '' }}>Portugal</option>
                                            <option value="Puerto Rico" {{ $shipment->destination == "Puerto Rico" ? 'selected' : '' }}>Puerto Rico</option>
                                            <option value="Qatar" {{ $shipment->destination == "Qatar" ? 'selected' : '' }}>Qatar</option>
                                            <option value="Reunion" {{ $shipment->destination == "Reunion" ? 'selected' : '' }}>Reunion</option>
                                            <option value="Romania" {{ $shipment->destination == "Romania" ? 'selected' : '' }}>Romania</option>
                                            <option value="Russia" {{ $shipment->destination == "Russia" ? 'selected' : '' }}>Russia</option>
                                            <option value="Rwanda" {{ $shipment->destination == "Rwanda" ? 'selected' : '' }}>Rwanda</option>
                                            <option value="Saint Helena" {{ $shipment->destination == "Saint Helena" ? 'selected' : '' }}>Saint Helena</option>
                                            <option value="Saint Kitts &amp; Nevis" {{ $shipment->destination == "Saint Kitts & Nevis" ? 'selected' : '' }}>Saint Kitts &amp; Nevis</option>
                                            <option value="Saint Lucia" {{ $shipment->destination == "Saint Lucia" ? 'selected' : '' }}>Saint Lucia</option>
                                            <option value="St Pierre &amp; Miquelon" {{ $shipment->destination == "St Pierre & Miquelon" ? 'selected' : '' }}>St Pierre &amp; Miquelon</option>
                                            <option value="Saint Vincent and the Grenadines" {{ $shipment->destination == "Saint Vincent and the Grenadines" ? 'selected' : '' }}>Saint Vincent and the
                                                Grenadines</option>
                                            <option value="Samoa" {{ $shipment->destination == "Samoa" ? 'selected' : '' }}>Samoa</option>
                                            <option value="San Marino" {{ $shipment->destination == "San Marino" ? 'selected' : '' }}>San Marino</option>
                                            <option value="Sao Tome &amp; Principe" {{ $shipment->destination == "Sao Tome & Principe" ? 'selected' : '' }}>Sao Tome &amp; Principe</option>
                                            <option value="Saudi Arabia" {{ $shipment->destination == "Saudi Arabia" ? 'selected' : '' }}>Saudi Arabia</option>
                                            <option value="Senegal" {{ $shipment->destination == "Senegal" ? 'selected' : '' }}>Senegal</option>
                                            <option value="Serbia" {{ $shipment->destination == "Serbia" ? 'selected' : '' }}>Serbia</option>
                                            <option value="Seychelles" {{ $shipment->destination == "Seychelles" ? 'selected' : '' }}>Seychelles</option>
                                            <option value="Sierra Leone" {{ $shipment->destination == "Sierra Leone" ? 'selected' : '' }}>Sierra Leone</option>
                                            <option value="Singapore" {{ $shipment->destination == "Singapore" ? 'selected' : '' }}>Singapore</option>
                                            <option value="Slovakia" {{ $shipment->destination == "Slovakia" ? 'selected' : '' }}>Slovakia</option>
                                            <option value="Slovenia" {{ $shipment->destination == "Slovenia" ? 'selected' : '' }}>Slovenia</option>
                                            <option value="Solomon Islands" {{ $shipment->destination == "Solomon Islands" ? 'selected' : '' }}>Solomon Islands</option>
                                            <option value="Somalia" {{ $shipment->destination == "Somalia" ? 'selected' : '' }}>Somalia</option>
                                            <option value="South Africa" {{ $shipment->destination == "South Africa" ? 'selected' : '' }}>South Africa</option>
                                            <option value="Spain" {{ $shipment->destination == "Spain" ? 'selected' : '' }}>Spain</option>
                                            <option value="Sri Lanka" {{ $shipment->destination == "Sri Lanka" ? 'selected' : '' }}>Sri Lanka</option>
                                            <option value="Sudan" {{ $shipment->destination == "Sudan" ? 'selected' : '' }}>Sudan</option>
                                            <option value="Suriname" {{ $shipment->destination == "Suriname" ? 'selected' : '' }}>Suriname</option>
                                            <option value="Swaziland" {{ $shipment->destination == "Swaziland" ? 'selected' : '' }}>Swaziland</option>
                                            <option value="Sweden" {{ $shipment->destination == "Sweden" ? 'selected' : '' }}>Sweden</option>
                                            <option value="Switzerland" {{ $shipment->destination == "Switzerland" ? 'selected' : '' }}>Switzerland</option>
                                            <option value="Syria" {{ $shipment->destination == "Syria" ? 'selected' : '' }}>Syria</option>
                                            <option value="Taiwan" {{ $shipment->destination == "Taiwan" ? 'selected' : '' }}>Taiwan</option>
                                            <option value="Tajikistan" {{ $shipment->destination == "Tajikistan" ? 'selected' : '' }}>Tajikistan</option>
                                            <option value="Tanzania" {{ $shipment->destination == "Tanzania" ? 'selected' : '' }}>Tanzania</option>
                                            <option value="Thailand" {{ $shipment->destination == "Thailand" ? 'selected' : '' }}>Thailand</option>
                                            <option value="Togo" {{ $shipment->destination == "Togo" ? 'selected' : '' }}>Togo</option>
                                            <option value="Tonga" {{ $shipment->destination == "Tonga" ? 'selected' : '' }}>Tonga</option>
                                            <option value="Trinidad &amp; Tobago" {{ $shipment->destination == "Trinidad & Tobago" ? 'selected' : '' }}>Trinidad &amp; Tobago</option>
                                            <option value="Tunisia" {{ $shipment->destination == "Tunisia" ? 'selected' : '' }}>Tunisia</option>
                                            <option value="Turkey" {{ $shipment->destination == "Turkey" ? 'selected' : '' }}>Turkey</option>
                                            <option value="Turkmenistan" {{ $shipment->destination == "Turkmenistan" ? 'selected' : '' }}>Turkmenistan</option>
                                            <option value="Turks &amp; Caicos Is" {{ $shipment->destination == "Turks & Caicos Is" ? 'selected' : '' }}>Turks &amp; Caicos Is</option>
                                            <option value="Tuvalu" {{ $shipment->destination == "Tuvalu" ? 'selected' : '' }}>Tuvalu</option>
                                            <option value="Uganda" {{ $shipment->destination == "Uganda" ? 'selected' : '' }}>Uganda</option>
                                            <option value="Ukraine" {{ $shipment->destination == "Ukraine" ? 'selected' : '' }}>Ukraine</option>
                                            <option value="United Arab Emirates" {{ $shipment->destination == "United Arab Emirates" ? 'selected' : '' }}>United Arab Emirates</option>
                                            <option value="United Kingdom" {{ $shipment->destination == "United Kingdom" ? 'selected' : '' }}>United Kingdom</option>
                                            <option value="United States" {{ $shipment->destination == "United States" ? 'selected' : '' }}>United States</option>
                                            <option value="Uruguay" {{ $shipment->destination == "Uruguay" ? 'selected' : '' }}>Uruguay</option>
                                            <option value="Uzbekistan" {{ $shipment->destination == "Uzbekistan" ? 'selected' : '' }}>Uzbekistan</option>
                                            <option value="Vanuatu" {{ $shipment->destination == "Vanuatu" ? 'selected' : '' }}>Vanuatu</option>
                                            <option value="Venezuela" {{ $shipment->destination == "Venezuela" ? 'selected' : '' }}>Venezuela</option>
                                            <option value="Vietnam" {{ $shipment->destination == "Vietnam" ? 'selected' : '' }}>Vietnam</option>
                                            <option value="Virgin Islands" {{ $shipment->destination == "Virgin Islands" ? 'selected' : '' }}>Virgin Islands</option>
                                            <option value="Wallis and Futuna" {{ $shipment->destination == "Wallis and Futuna" ? 'selected' : '' }}>Wallis and Futuna</option>
                                            <option value="West Bank" {{ $shipment->destination == "West Bank" ? 'selected' : '' }}>West Bank</option>
                                            <option value="Western Sahara" {{ $shipment->destination == "Western Sahara" ? 'selected' : '' }}>Western Sahara</option>
                                            <option value="Yemen" {{ $shipment->destination == "Yemen" ? 'selected' : '' }}>Yemen</option>
                                            <option value="Zambia" {{ $shipment->destination == "Zambia" ? 'selected' : '' }}>Zambia</option>
                                            <option value="Zimbabwe" {{ $shipment->destination == "Zimbabwe" ? 'selected' : '' }}>Zimbabwe</option>
                                        </select>

                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="pickup_date" class="form-label">{{__('Pickup Date') }}</label>
                                        <input class="form-control" name="pickup_date" type="date" value="{{ $shipment->pickup_date }}" id="pickup_date">
                                    </div>
                                    <div class="form-group ">
                                        <label for="pickup_time" class="form-label">{{__('Pickup Time') }}</label>
                                        <input class="form-control" name="pickup_time" type="time" value="{{ $shipment->pickup_time }}" id="pickup_time">
                                    </div>
                                    <div class="form-group ">
                                        <label for="delivery_date" class="form-label">{{__('Expected Delivery Date') }}</label>
                                        <input class="form-control" name="delivery_date" type="date" value="{{ $shipment->delivery_date }}"
                                            id="delivery_date">
                                    </div>

                                </div>{{--  end section 2 --}}

                                <div class="form-group  col-md-12">
                                    <label for="description" class="form-label">{{__('Comments') }}</label>
                                    <textarea class="form-control" rows="3" name="comments" cols="50" id="description" value="{{ $shipment->comments }}"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- status --}}
                 
                    <div class=" col-md-3" style="height: 40%; ">
                        <div class="row">
                            <div class="card col-md-12 p-3">
                                <h3>{{__('Current Status') }}:</h3>
                        <div class="form-group ">
                            <label for="status_date" class="form-label"> {{__('Date') }}</label>
                            <input class="form-control" name="status_date" type="date" value="{{ $shipment->status_date }}" id="status_date"
                                placeholder="Date">
                        </div>
                        <div class="form-group ">
                            <label for="status_time" class="form-label"> {{__('Time') }}</label>
                            <input class="form-control" name="status_time" type="time" value="{{ $shipment->status_time }}" id="status_time"
                                placeholder="Time">
                        </div>
                        <div class="form-group ">
                            <label for="status_location" class="form-label"> {{__('Location') }}</label>
                            <input class="form-control" name="status_location" type="text" value="{{ $shipment->status_location }}" id="status_location"
                                placeholder="Enter a location">
                        </div>
                        <div class="btn-box">
                            <label for="choices-multiple" class="form-label">{{__('Status') }}</label>
                            <select class="form-control select" id="choices-multiple" name="package_status" >
                                <option value="">-- Select Type --</option>
                                <option value="Pending" {{ $shipment->package_status == "Pending" ? 'selected' : '' }}>{{__('Pending') }}</option>
                                <option value="Picked up" {{ $shipment->package_status == "Picked up" ? 'selected' : '' }}>{{__('Picked up') }}</option>
                                <option value="On Hold" {{ $shipment->package_status == "On Hold" ? 'selected' : '' }}>{{__('On Hold') }}</option>
                                <option value="Out for delivery" {{ $shipment->package_status == "Out for delivery" ? 'selected' : '' }}>{{__('Out for delivery') }}</option>
                                <option value="In Transit" {{ $shipment->package_status == "In Transit" ? 'selected' : '' }}>{{__('In Transit') }}</option>
                                <option value="Enroute" {{ $shipment->package_status == "Enroute" ? 'selected' : '' }}>{{__('Enroute') }}</option>
                                <option value="Cancelled" {{ $shipment->package_status == "Cancelled" ? 'selected' : '' }}>{{__('Cancelled') }}</option>
                                <option value="Delivered" {{ $shipment->package_status == "Delivered" ? 'selected' : '' }}>{{__('Delivered') }}</option>
                                <option value="Returned" {{ $shipment->package_status == "Returned" ? 'selected' : '' }}>{{__('Returned') }}</option>
                            </select>
                        </div>
                        <div class="float-end mt-5">
                            <button type="submit" class="btn  btn-primary">{{__('update') }}</button>
                        </div>
                            </div>
                            <div class="card col-md-12 p-4">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="project_image" class="form-label">{{__('Attachment File') }}</label>
                                    <div class="form-file mb-3">
                                        <input type="file" class="form-control" name="attach_file" value="{{ $shipment->attach_file }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <div class="card col-md-11 table-responsive p-3">
                    <h3 class="hndle ui-sortable-handle">{{__('Packages') }}</h3>

                    <div class="inside">

                        <div class="wpc-mp-wrap ">
                            <table id="package-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="bg-primary p-2">{{__('Qty') }}</th>
                                        <th class="bg-primary">{{__('Piece Type') }}</th>
                                        <th class="bg-primary">{{__('Description') }}</th>
                                        <th class="bg-primary">{{__('Length(cm)') }}</th>
                                        <th class="bg-primary">{{__('Width(cm)') }}</th>
                                        <th class="bg-primary">{{__('Height(cm)') }}</th>
                                        <th class="bg-primary">{{__('Weight (kg)') }}</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="wpc-multiple-package" id="add-table">
                                    <tr>
                                        <td>
                                            <input id="" class="" type="number" name="package_qty"
                                                value="">
                                        </td>
                                        <td>
                                            <select id="wpc-pm-piece-type" class="" name="package_piece-type">
                                                <option value="">-- Select Type --</option>
                                                <option value="Pallet">{{_('Pallet') }}</option>
                                                <option value="Carton">{{__('Carton') }}</option>
                                                <option value="Crate">{{__('Crate') }}</option>
                                                <option value="Loose">{{__('Loose') }}</option>
                                                <option value="Others">{{__('Others') }}</option>
                                            </select>
                                        </td>
                                        <td>
                                            <textarea id="wpc-pm-description" class="" name="package_description"></textarea>
                                        </td>
                                        <td>
                                            <input id="wpc-pm-length" class="" type="number"
                                                name="package_length" value="">
                                        </td>
                                        <td>
                                            <input id="wpc-pm-width" class="" type="number" name="package_width"
                                                value="">
                                        </td>
                                        <td>
                                            <input id="wpc-pm-height" class="" type="number"
                                                name="package_height" value="">
                                        </td>
                                        <td>
                                            <input id="wpc-pm-weight" class="" type="number"
                                                name="package_weight" value="">
                                        </td>
                                        <td><input data-repeater-delete="" type="button" class="btn btn-danger"
                                                value="Delete">
                                        </td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="6"><input data-repeater-create="" type="button"
                                                class="btn btn-primary wpc-add" id="add-package" value="{{__('Add Package') }}">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            {{-- calculate package weight --}}
                            {{-- <div id="package-weight-info" class="wpcargo-container"
                        style="&quot;display:block;overflow:hidden;margin-bottom:36px;&quot;">
                        <div class="wpcargo-row">
                            <section class="one-third first" style="text-align: center; font-weight: bold;">
                                Total Volumetric Weight : <span id="package_volumetric">0.00</span>kg.
                            </section>
                            <section class="one-third" style="text-align: center; font-weight: bold;">
                                Total Volume : <span id="package_volume">0.00</span>cu. m. </section>
                            <section class="one-third" style="text-align: center; font-weight: bold;">
                                Total Actual Weight : <span id="package_actual_weight">0.00</span>kg.
                            </section>
                        </div>
                    </div> --}}
                            <script>
                                var mainContainer = document.querySelector('table tbody[data-repeater-list="wpc-multiple-package"]');
                                var divisor = 5000;
                                var dimMeta = ["wpc-pm-length", "wpc-pm-width", "wpc-pm-height"];
                                var qtyMeta = "wpc-pm-qty";
                                var weightMeta = "wpc-pm-weight";
                                var cubic_divisor = 1000000;
                                var cubic_operator = "/";
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
                                        var rows = mainContainer.querySelectorAll('tr');
                                        rows.forEach(function(row) {
                                            console.log(row);

                                            var currentVolumetric = 1;
                                            var currentQTY = 0;
                                            var packageWeight = 0;
                                            var inputs = row.querySelectorAll('input');
                                            inputs.forEach(function(input) {
                                                var currentField = input;
                                                var className = currentField.getAttribute('name');
                                                // Exclude in the loop field without name attribute
                                                if (!className) {
                                                    return;
                                                }
                                                // Get the QTY
                                                if (className.indexOf(qtyMeta) > -1) {
                                                    var pQty = currentField.value == '' ? 0 : currentField.value;
                                                    totalQTY += parseFloat(pQty);
                                                    currentQTY = parseFloat(pQty);
                                                }
                                                // Get the weight
                                                if (className.indexOf(weightMeta) > -1) {
                                                    var pWeight = currentField.value == '' ? 0 : currentField.value;
                                                    packageWeight += parseFloat(pWeight);
                                                }

                                                // Calculate the volumetric
                                                dimMeta.forEach(function(value) {
                                                    if (className.indexOf(value) == -1) {
                                                        return;
                                                    }
                                                    currentVolumetric *= parseFloat(currentField.value);
                                                });
                                            });
                                            totalVolumetric += currentQTY * (currentVolumetric / divisor);
                                            totalWeight += currentQTY * packageWeight;
                                            // totalVolume    += currentQTY * currentVolumetric;
                                            // Calculate Volume
                                            if (cubic_operator == '*') {
                                                totalVolume += currentQTY * (currentVolumetric * cubic_divisor);
                                            } else {
                                                totalVolume += currentQTY * (currentVolumetric / cubic_divisor);
                                            }
                                        });

                                        var packageVolumeElement = document.querySelector('#package-weight-info #package_volume');
                                        packageVolumeElement.textContent = totalVolume.toFixed(getDecimal(totalVolume));

                                        var packageVolumetricElement = document.querySelector('#package-weight-info #package_volumetric');
                                        packageVolumetricElement.textContent = totalVolumetric.toFixed(getDecimal(totalVolumetric));

                                        var packageActualWeightElement = document.querySelector(
                                            '#package-weight-info #package_actual_weight');
                                        packageActualWeightElement.textContent = totalWeight.toFixed(getDecimal(totalWeight));
                                    }

                                    if (mainContainer) {
                                        mainContainer.addEventListener('change', function(event) {
                                            if (event.target.tagName === 'INPUT') {
                                                calculatePackage();
                                            }
                                        });

                                        var observer = new MutationObserver(function() {
                                            setTimeout(function() {
                                                calculatePackage();
                                            }, 1000);
                                        });
                                        observer.observe(mainContainer, {
                                            childList: true,
                                            subtree: true
                                        });
                                    }
                                });
                            </script>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                'use strict';

                                // var trackingNoInput = document.getElementById('tracking_no');

                                // if (trackingNoInput) {
                                //     trackingNoInput.value = generateTrackingNumber();
                                // }

                                // function generateTrackingNumber() {
                                //     var prefix = 'gsf-';
                                //     var randomNumbers = Math.floor(Math.random() * 1000000000).toString().padStart(9, '0');
                                //     return prefix + randomNumbers;
                                // }


                                var addPackageBtn = document.getElementById('add-package');
                                var addTableBody = document.getElementById('add-table');

                                if (addPackageBtn) {
                                    addPackageBtn.addEventListener('click', function() {
                                        // Clone the first row of the table
                                        var newRow = addTableBody.querySelector('tr').cloneNode(true);

                                        // Clear input values of the cloned row
                                        var inputs = newRow.querySelectorAll('input[type="number"], select, textarea');
                                        inputs.forEach(function(input) {
                                            input.value = '';
                                        });

                                        // Append the new row to the table body
                                        addTableBody.appendChild(newRow);

                                        // Add event listener to the delete button of the new row
                                        var deleteBtn = newRow.querySelector('[data-repeater-delete]');
                                        deleteBtn.addEventListener('click', function() {
                                            newRow.remove();
                                        });
                                    });
                                }
                            });
                        </script>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
