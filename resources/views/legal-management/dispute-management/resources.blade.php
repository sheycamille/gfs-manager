{{Form::open(array('url'=>route("disputes.resource.create",$id),'method'=>'post', 'enctype' => "multipart/form-data"))}}
<div class="modal-body">
    {{-- start for ai module--}}
    <div class="row">
        <div class="form-group col-md-12">
            <label class="form-check-label mx-2" for="flexSwitchCheckDefault">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-check-label mx-2" for="">File</label>
                <input name="file" class="form-control" type="file">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-check-label mx-2" for="">Description</label>
                <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
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

