@extends('layouts.admin')
@section('page-title')
    {{ __('New Warehouse') }}
@endsection
@push('script-page')
@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('New Warehouse') }}</li>
@endsection

@section('content')
    <div class="row d-flex flex-column align-items-start gy-2">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body ">
                    <div class="d-flex flex-column">
                        {{ Form::open(['route' => 'warehouse.store']) }}
                        {{-- start for ai module --}}
                        @php
                            $settings = \App\Models\Utility::settings();
                        @endphp
                        @if ($settings['ai_chatgpt_enable'] == 'on')
                            <div class="text-end">
                                <a href="#" data-size="md" class="btn  btn-primary btn-icon btn-sm"
                                    data-ajax-popup-over="true" data-url="{{ route('generate', ['warehouse']) }}"
                                    data-bs-placement="top" data-title="{{ __('Generate content with AI') }}">
                                    <i class="fas fa-robot"></i> <span>{{ __('Generate with AI') }}</span>
                                </a>
                            </div>
                        @endif
                        {{-- end for ai module --}}
                        <div class="row">
                            <div class="form-group col-xl-12">
                                {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
                                {{ Form::text('name', '', ['class' => 'form-control', 'required' => 'required']) }}
                            </div>
                            <div class="form-group col-md-12">
                                {{ Form::label('address', __('Address'), ['class' => 'form-label']) }}
                                {{ Form::textarea('address', null, ['class' => 'form-control', 'rows' => 3]) }}
                            </div>
                            <div class="form-group col-md-6">
                                {{ Form::label('city', __('City'), ['class' => 'form-label']) }}
                                {{ Form::text('city', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group col-md-6">
                                {{ Form::label('city_zip', __('Zip Code'), ['class' => 'form-label']) }}
                                {{ Form::text('city_zip', null, ['class' => 'form-control']) }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body ">
                    <div class="d-flex flex-row mb-3">
                        <div class="col-6">
                            <h6>Add Item To Warehouse</h6>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column align-items-end mb-2">
                                <button type="button" onclick="addItem()" class="btn btn-primary"> <i class="ti ti-plus">
                                    </i>Add Item</button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" id="items-container" style="max-height: 40vh; overflow-y: scroll">
                    </div>
                    <div class="d-flex justify-content-end my-3">
                        <div>
                            <button type="submit" id="submit" class="btn btn-primary">{{ __("Create Warehouse") }}</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        {{ Form::close() }}
    </div>

    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
    <script>
        var items = 0;
        var test = warehouseProduct

        function addItem() {

            const wrapper = document.createElement("div");

            wrapper.innerHTML = `
                <hr>
                <div class="text-end">
                    <button class="btn btn-danger btn-sm" type="button" id="item-delete-${items}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Item Name</label>
                        <input name="items[]" class="form-control" required>
                        </input>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Quantity</label>
                        <input name="items[]" class="form-control" required>
                        </input>
                    </div>
                    
                </div>
            `;

            document.getElementById("items-container").prepend(wrapper);
            document.getElementById("item-delete-" + items).addEventListener("click", (e) => {
                wrapper.remove();
            });
            items += 1;

            return;
        }
    </script>
@endsection
