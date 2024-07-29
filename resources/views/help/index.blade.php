@extends('layouts.admin')

@section('page-title')
    {{__('Help')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Help')}}</li>
@endsection


@section('content')
    <p>content goes hear</p>
@endsection
