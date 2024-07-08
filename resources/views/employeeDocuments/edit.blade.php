{{Form::open(array('url'=>'employee-documents/'.$document->id.'/update','method'=>'post', 'enctype' => "multipart/form-data"))}}
<div class="modal-body">
    {{-- start for ai module--}}
    @php
        $settings = \App\Models\Utility::settings();
        $documentPath=\App\Models\Utility::get_file('uploads/document');
    @endphp
    @if($settings['ai_chatgpt_enable'] == 'on')
        <div class="text-end">
            <a href="#" data-size="md" class="btn  btn-primary btn-icon btn-sm" data-ajax-popup-over="true" data-url="{{ route('generate',['document']) }}"
               data-bs-placement="top" data-title="{{ __('Generate content with AI') }}">
                <i class="fas fa-robot"></i> <span>{{__('Generate with AI')}}</span>
            </a>
        </div>
    @endif
    {{-- end for ai module--}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('employee',__('Employee'),['class'=>'form-label'])}}
                <select name="employee_id" class="form-control select" required>
                    @foreach ($employees as $employee)
                        <option 
                        value="{{ $employee->id }}" 
                        @if($employee->id == $document->employee_id)
                            selected
                        @endif
                        >{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('document type',__('Document Type'),['class'=>'form-label'])}}
                <select name="document_type_id" class="form-control select" required>
                    @foreach ($types as $type)
                        <option 
                        value="{{ $type->id }}" 
                        @if($type->id == $document->employee_document_type_id)
                            selected
                        @endif
                        >{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('description', __('Description'),['class'=>'form-label'])}}
                {{ Form::textarea('description',null, array('class' => 'form-control' ,'rows'=> 3)) }}
            </div>
        </div> --}}

        <div class="col-md-12 form-group">
            {{Form::label('document',__('Document'),['class'=>'form-label'])}}
            <div class="choose-file ">
                <label for="document" class="form-label">
                    <input type="file" class="form-control" name="document" id="document" data-filename="document_edit">
                    <img id="image" class="mt-3" style="width:25%;" src="{{ $documentPath . $document->document_value }}"/>
                </label>
            </div>
        </div>


    </div>
</div>
<div class="modal-footer">
    <input type="button" value="{{__('Cancel')}}" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Update')}}" class="btn  btn-primary">
</div>
{{Form::close()}}


<script>
    document.getElementById('document').onchange = function () {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById('image').src = src
    }
</script>

