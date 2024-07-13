{{Form::open(array('url'=>route("disputes.handler.create",$id),'method'=>'post', 'enctype' => "multipart/form-data"))}}
<div class="modal-body">
    {{-- start for ai module--}}
    <div class="row">
        <div class="form-group col-md-12">
            <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-check-label mx-2" for="">Start Date</label>
                <input name="start_date" class="form-control" type="date">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-check-label mx-2" for="">End Date</label>
                <input name="end_date" class="form-control" type="date">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">

    <input type="button" value="{{__('Cancel')}}" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Create')}}" class="btn  btn-primary">
</div>
{{Form::close()}}


<script>
    document.getElementById('document').onchange = function () {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById('image').src = src
    }
</script>

