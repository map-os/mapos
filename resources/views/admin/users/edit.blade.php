@extends('layouts.app')

@section('title', __('messages.edit_user'))

@section('content_header')
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h2>{{ __('messages.edit_user') }}</h2>
        </div>
    </div>
@stop

@section('content')
    @include('admin.users._form', ['user' => $user])
@stop

@section('js')
@endsection
