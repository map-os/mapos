@extends('layouts.app')

@section('title', __('messages.create_warranty'))

@section('content_header')
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h2>{{ __('messages.create_warranty') }}</h2>
        </div>
    </div>
@stop

@section('content')
    @include('admin.warrantys._form', ['warranty' => $warranty])
@stop
