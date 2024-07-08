{{ Form::open(array('url' => 'employees/contract/'.$contract->id.'/update')) }}
<div class="modal-body">
    {{-- start for ai module--}}
    @php
        $settings = \App\Models\Utility::settings();
    @endphp
    @if($settings['ai_chatgpt_enable'] == 'on')
        <div class="text-end">
            <a href="#" data-size="md" class="btn  btn-primary btn-icon btn-sm" data-ajax-popup-over="true" data-url="{{ route('generate',['contract']) }}"
               data-bs-placement="top" data-title="{{ __('Generate content with AI') }}">
                <i class="fas fa-robot"></i> <span>{{__('Generate with AI')}}</span>
            </a>
        </div>
    @endif
    {{-- end for ai module--}}
    <div class="row">
        <div class="form-group col-md-12">
            <label for="employee_id" class="form-label">Employee</label>
            <select name="employee_id" id="employee_id" class="form-control">
                <option disabled selected>--Select Employee</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $employee->id == $contract->employee_id?'selected':"" }}>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6">
            <label for="contractType" class="form-label">Contract Type</label>
            <select name="contract_type_id" id="contractType" class="form-control">
                <option disabled selected>--Select Contract Type</option>
                @foreach($contractTypes as $contract_type)
                    <option value="{{ $contract_type->id }}" {{ $contract_type->id == $contract->contract_type_id?'selected':"" }}>{{ $contract_type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="template_id" class="form-label">Contract Template</label>
            <select name="template_id" id="template_id" class="form-control">
                <option disabled selected>--Select Contract Template</option>
                @foreach($templates as $template)
                    <option value="{{ $template->id }}" {{ $template->id == $contract->template_id?'selected':"" }}>{{ $template->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option disabled selected>--Select Status</option>
                <option value="accept" {{ 'accept' == $contract->status?'selected':"" }}>Accepted</option>
                <option value="pending" {{ 'pending' == $contract->status?'selected':"" }}>Pending</option>
                <option value="suspended" {{ 'suspended' == $contract->status?'selected':"" }}>Suspended</option>
            </select>
        </div>
        
        <div class="form-group col-md-6">
            {{ Form::label('value', __('Contract Value'),['class'=>'form-label']) }}
            <input type="number" name="contract_value" class="form-control" value="{{ $contract->contract_value }}" required>
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('start_date', __('Start Date'),['class'=>'form-label']) }}
            <input type="date" name="start_date" class="form-control" value="{{ $contract->start_date }}" required>
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('end_date', __('End Date'),['class'=>'form-label']) }}
            <input type="date" name="end_date" class="form-control" value="{{ $contract->end_date }}" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            {{ Form::label('description', __('Description'),['class'=>'form-label']) }}
            <textarea name="description" class="form-control" cols="30" rows="3"> {{ $contract->description }} </textarea>
        </div>
    </div>
</div>
</div>
<div class="modal-footer">
    <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Update')}}" class="btn  btn-primary">
</div>
{{Form::close()}}

<script src="{{asset('assets/js/plugins/choices.min.js')}}"></script>
<script>
    if ($(".multi-select").length > 0) {
        $( $(".multi-select") ).each(function( index,element ) {
            var id = $(element).attr('id');
            var multipleCancelButton = new Choices(
                '#'+id, {
                    removeItemButton: true,
                }
            );
        });
    }
</script>

