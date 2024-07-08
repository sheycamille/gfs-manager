@extends('layouts.admin')
{{-- @php
//    $profile=asset(Storage::url('uploads/avatar/'));
$profile=\App\Models\Utility::get_file('uploads/avatar');
@endphp --}}
@section('page-title')
    {{__('Document Types')}}
@endsection
@push('script-page')
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300,
        })
        $(".list-group-item").click(function(){
            $('.list-group-item').filter(function(){
                return this.href == id;
            }).parent().removeClass('text-primary');
        });
    </script>
@endpush
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Employee Setup')}}</li>
    <li class="breadcrumb-item">{{__('Settings')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3">
            <div class="card sticky-top" style="top:30px">
                <div class="list-group list-group-flush" id="useradd-sidenav">
                    <a href="#document_types" class="list-group-item list-group-item-action border-0">{{__('Document Types')}} <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                </div>
            </div>
        </div>
        <div class="col-xl-9">
            <div id="document_types" class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{__('Document Types')}}</h5>
                    @can('create document')
                        <a href="#" data-url="{{ route('employee-document-types.create') }}" data-ajax-popup="true" data-title="{{__('Create New Document Type')}}" data-bs-toggle="tooltip" title="{{__('Create')}}"  class="btn btn-sm btn-primary">
                            <i class="ti ti-plus"></i>
                        </a>
                    @endcan
                </div>
                <div class="card-body" style="min-height: 55vh; max-height:100vh; overflow-y:scroll">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                @if(Gate::check('edit document type') || Gate::check('delete document type'))
                                    <th>{{__('Action')}}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            @foreach ($types as $document_type)
                                <tr>
                                    <td>{{ $document_type->name }}</td>
                                    {{-- @if(Gate::check('edit document type') || Gate::check('delete document type')) --}}
                                        <td>
                                            {{-- @can('edit document type') --}}
                                                <div class="action-btn bg-primary ms-2">
                                                    <a href="#" data-url="{{ route('employee-document-types.edit',$document_type->id)}}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Document Type')}}" class="mx-3 btn btn-sm align-items-center" data-bs-toggle="tooltip" title="{{__('Edit')}}" data-original-title="{{__('Edit')}}"><i class="ti ti-pencil text-white"></i></a>
                                                </div>
                                            {{-- @endcan --}}
                                            {{-- @can('delete document type') --}}
                                                <div class="action-btn bg-danger ms-2">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['employee-document-types.destroy', $document_type->id],'id'=>'delete-form-'.$document_type->id]) !!}

                                                    <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para" data-bs-toggle="tooltip" title="{{__('Delete')}}" data-original-title="{{__('Delete')}}" data-confirm="{{__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$document_type->id}}').submit();"><i class="ti ti-trash text-white"></i></a>
                                                    {!! Form::close() !!}
                                                </div>
                                            {{-- @endif --}}
                                        </td>
                                    {{-- @endif --}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            
        </div>
@endsection
