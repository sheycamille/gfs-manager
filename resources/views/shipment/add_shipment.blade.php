@extends('layouts.admin')
@section('page-title')
    {{ __('Add New Shipment') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Add Shipment') }}</li>
@endsection



@section('content')
    <div class=" mt-5 p-3">

        <form action="{{ route('shipment.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <input type="text" class="form-control" name="tracking_no" value="" id="tracking_no"
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
                                        <input class="form-control" name="shipper_name" type="text" id="shipper_name">
                                    </div>
                                    <div class="form-group col">
                                        <label for="shipper_phone" class="form-label">{{__('Phone Number') }}</label>
                                        <input class="form-control" name="shipper_phone" type="text" id="shipper_phone">
                                    </div>
                                    <div class="form-group col">
                                        <label for="shipper_address" class="form-label">{{__('Address') }}</label>
                                        <input class="form-control" name="shipper_address" type="text"
                                            id="shipper_address">
                                    </div>
                                    <div class="form-group col">
                                        <label for="shipper_email" class="form-label">{{__('Email') }}</label>
                                        <input class="form-control" name="shipper_email" type="text" id="shipper_email">
                                    </div>


                                </div> <!-- shipper-details -->
                                <div id="receiver-details" class="col-md-6">
                                    <h3 class="mb-3">{{__('Receiver Details') }}</h3>
                                    <div class="form-group col">
                                        <label for="receiver_name" class="form-label">{{__('Receiver Name') }}</label>
                                        <input class="form-control" name="receiver_name" type="text" id="receiver_name">
                                    </div>
                                    <div class="form-group col">
                                        <label for="receiver_phone" class="form-label">{{__('Phone Number') }}</label>
                                        <input class="form-control" name="receiver_phone" type="text"
                                            id="receiver_phone">
                                    </div>
                                    <div class="form-group col">
                                        <label for="receiver_address" class="form-label">{{__('Address') }}</label>
                                        <input class="form-control" name="receiver_address" type="text"
                                            id="receiver_address">
                                    </div>
                                    <div class="form-group col">
                                        <label for="receiver_email" class="form-label">{{__('Email') }}</label>
                                        <input class="form-control" name="receiver_email" type="text"
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
                                            <option value="Air Freight">{{__('Air Freight') }}</option>
                                            <option value="International Shipping">{{__('International Shipping') }}</option>
                                            <option value="Truckload">{{__('Truckload') }}</option>
                                            <option value="Van Move">{{__('Van Move') }}</option>
                                        </select>
                                    </div>
                                    <div class="col form-group mt-2">
                                        <label for="weight" class="form-label">{{__('Weight') }}</label>
                                        <input class="form-control" name="weight" type="text" id="weight">
                                    </div>

                                    <div class="col form-group ">
                                        <label for="packages" class="form-label">{{__('Packages') }}</label>
                                        <input class="form-control" name="packages" type="text" id="packages">
                                    </div>
                                    <div class="btn-box">
                                        <label for="choices-multiple" class="form-label">{{ __('Mode') }}</label>
                                        <select class="form-control select" id="choices-multiple" name="mode_field">
                                            <option value="">-- Select One --</option>
                                            <option value="Air Freight">{{__('Air Freight') }}</option>
                                            <option value="Sea Transport">{{__('Sea Transport') }}</option>
                                            <option value="Land Shipping">{{__('Land Shipping') }}</option>
                                            <option value="Air Freight">{{__('Air Freight') }}</option>
                                        </select>
                                    </div>
                                    <div class="col form-group mt-2">
                                        <label for="product" class="form-label">{{__('Product') }}</label>
                                        <input class="form-control" name="product" type="text" id="product">
                                    </div>
                                    <div class="form-group ">
                                        <label for="qty" class="form-label">{{__('Quantity') }}</label>
                                        <input class="form-control" name="qty" type="text" id="qty">
                                    </div>
                                    <div class="btn-box">
                                        <label for="choices-multiple" class="form-label">{{__('Payment Mode') }}</label>
                                        <select class="form-control select" id="choices-multiple" name="payment_method">
                                            <option value="">-- Select One --</option>
                                            <option value="online">{{__('ONLINE') }}</option>
                                            <option value="onsite">{{__('ONSITE') }}</option>

                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="total_freight" class="form-label">{{__('Total Freight') }}</label>
                                        <input class="form-control" name="total_freight" type="text"
                                            id="total_freight">
                                    </div>
                                </div>{{-- end section 1 --}}

                                <div class="col-md-6" id="section-2">

                                    <div class="btn-box">
                                        <label for="choices-multiple" class="form-label">{{__('Carrier') }}</label>
                                        <select class="form-control select" id="choices-multiple" name="carrier_field">
                                            <option value="">-- Select One --</option>
                                            <option value="USPS">USPS</option>

                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="carrier_ref_number" class="form-label">{{__('Carrier Reference No') }}.</label>
                                        <input class="form-control" name="carrier_ref_number" type="text"
                                            id="carrier_ref_number">
                                    </div>
                                    <div class="form-group ">
                                        <label for="departure_time" class="form-label">{{__('Departure Time') }}</label>
                                        <input class="form-control" name="departure_time" type="time"
                                            id="departure_time">
                                    </div>
                                    <div class="btn-box">
                                        <label for="choices-multiple" class="form-label">{{__('Origin') }}</label>
                                        <select class="form-control select" id="choices-multiple" name="origin_field">
                                            <option value="">-- Select One --</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="The">The</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Virgin Is.">British Virgin Is.</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burma">Burma</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Rep.">Central African Rep.</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Dem. Rep.">Dem. Rep.</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Repub. of the">Repub. of the</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="The">The</option>
                                            <option value="Gaza Strip">Gaza Strip</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea">Korea</option>
                                            <option value="North">North</option>
                                            <option value="Korea">Korea</option>
                                            <option value="South">South</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia">Macedonia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia">Micronesia</option>
                                            <option value="Fed. St.">Fed. St.</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="N. Mariana Islands">N. Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Helena">Saint Helena</option>
                                            <option value="Saint Kitts &amp; Nevis">Saint Kitts &amp; Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the
                                                Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Virgin Islands">Virgin Islands</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="West Bank">West Bank</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>

                                    </div>
                                    <div class="btn-box mt-2">
                                        <label for="choices-multiple" class="form-label">{{__('Destination') }}</label>
                                        <select class="form-control select" id="choices-multiple" name="destination">
                                            <option value="">-- Select One --</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="The">The</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Virgin Is.">British Virgin Is.</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burma">Burma</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Rep.">Central African Rep.</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Dem. Rep.">Dem. Rep.</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Repub. of the">Repub. of the</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="The">The</option>
                                            <option value="Gaza Strip">Gaza Strip</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea">Korea</option>
                                            <option value="North">North</option>
                                            <option value="Korea">Korea</option>
                                            <option value="South">South</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia">Macedonia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia">Micronesia</option>
                                            <option value="Fed. St.">Fed. St.</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="N. Mariana Islands">N. Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Helena">Saint Helena</option>
                                            <option value="Saint Kitts &amp; Nevis">Saint Kitts &amp; Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the
                                                Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Virgin Islands">Virgin Islands</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="West Bank">West Bank</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>

                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="pickup_date" class="form-label">{{__('Pickup Date') }}</label>
                                        <input class="form-control" name="pickup_date" type="date" id="pickup_date">
                                    </div>
                                    <div class="form-group ">
                                        <label for="pickup_time" class="form-label">{{__('Pickup Time') }}</label>
                                        <input class="form-control" name="pickup_time" type="time" id="pickup_time">
                                    </div>
                                    <div class="form-group ">
                                        <label for="delivery_date" class="form-label">{{__('Expected Delivery Date') }}</label>
                                        <input class="form-control" name="delivery_date" type="date"
                                            id="delivery_date">
                                    </div>

                                </div>{{--  end section 2 --}}

                                <div class="form-group  col-md-12">
                                    <label for="description" class="form-label">{{__('Comments') }}</label>
                                    <textarea class="form-control" rows="3" name="comments" cols="50" id="description"></textarea>
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
                            <input class="form-control" name="status_date" type="date" id="status_date"
                                placeholder="Date">
                        </div>
                        <div class="form-group ">
                            <label for="status_time" class="form-label">{{__('Time') }}</label>
                            <input class="form-control" name="status_time" type="time" id="status_time"
                                placeholder="Time">
                        </div>
                        <div class="form-group ">
                            <label for="status_location" class="form-label">{{__('Location') }}</label>
                            <input class="form-control" name="status_location" type="text" id="status_location"
                                placeholder="Enter a location">
                        </div>
                        <div class="btn-box">
                            <label for="choices-multiple" class="form-label">{{__('Status') }}</label>
                            <select class="form-control select" id="choices-multiple" name="package_status">
                                <option value="">-- Select Type --</option>
                                <option value="Pending">{{__('Pending') }}</option>
                                <option value="Picked up">{{__('Picked up') }}</option>
                                <option value="On Hold">{{__('On Hold') }}</option>
                                <option value="Out for delivery">{{__('Out for delivery') }}</option>
                                <option value="In Transit">{{__('In Transit') }}</option>
                                <option value="Enroute">{{__('Enroute') }}</option>
                                <option value="Cancelled">{{__('Cancelled') }}</option>
                                <option value="Delivered">{{__('Delivered') }}</option>
                                <option value="Returned">{{__('Returned') }}</option>
                            </select>
                        </div>
                        <div class="float-end mt-5">
                            <button type="submit" class="btn  btn-primary">{{__('Save') }}</button>
                        </div>
                            </div>
                            <div class="card col-md-12 p-4">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label for="project_image" class="form-label">{{__('Attachment File') }}</label>
                                    <div class="form-file mb-3">
                                        <input type="file" class="form-control" name="attach_file">
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
                                    <tr data-repeater-item>
                                      <td>
                                        <input class="" type="number" name="package_qty" value="">
                                      </td>
                                      <td>
                                        <select class="" name="package_piece-type">
                                          <option value="">-- Select Type --</option>
                                          <option value="Pallet">{{_('Pallet') }}</option>
                                          <option value="Carton">{{__('Carton') }}</option>
                                          <option value="Crate">{{__('Crate') }}</option>
                                          <option value="Loose">{{__('Loose') }}</option>
                                          <option value="Others">{{__('Others') }}</option>
                                        </select>
                                      </td>
                                      <td>
                                        <textarea class="" name="package_description"></textarea>
                                      </td>
                                      <td>
                                        <input class="" type="number" name="package_length" value="">
                                      </td>
                                      <td>
                                        <input class="" type="number" name="package_width" value="">
                                      </td>
                                      <td>
                                        <input class="" type="number" name="package_height" value="">
                                      </td>
                                      <td>
                                        <input class="" type="number" name="package_weight" value="">
                                      </td>
                                      <td>
                                        <input data-repeater-delete type="button" class="btn btn-danger" value="Delete">
                                      </td>
                                    </tr>
                                  </tbody>
                                
                                  <tfoot>
                                    <tr>
                                      <td colspan="6">
                                        <input data-repeater-create type="button" class="btn btn-primary wpc-add" id="add-package"
                                          value="{{__('Add Package') }}">
                                      </td>
                                    </tr>
                                  </tfoot>
                                </table>
                                
                                {{-- calculate package weight --}}
                                <div id="package-weight-info" class="wpcargo-container"
                                  style="display: block; overflow: hidden; margin-bottom: 36px;">
                                  <div class="wpcargo-row">
                                    <section class="one-third first" style="text-align: center; font-weight: bold;">
                                      Total Volumetric Weight: <span id="package_volumetric">0.00</span>kg.
                                    </section>
                                    <section class="one-third" style="text-align: center; font-weight: bold;">
                                      Total Volume: <span id="package_volume">0.00</span>cu. m.
                                    </section>
                                    <section class="one-third" style="text-align: center; font-weight: bold;">
                                      Total Actual Weight: <span id="package_actual_weight">0.00</span>kg.
                                    </section>
                                  </div>
                                </div>
                            
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
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
