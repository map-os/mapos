@extends('layouts.app')

@section('title', __('messages.edit_customer'))

@section('content_header')

<div class="d-flex justify-content-between w-100 flex-wrap">
    <div class="mb-3 mb-lg-0">
        <h2>{{ __('messages.edit_customer') }}</h2>
    </div>
</div>

@stop

@section('content')
    @include('admin.profile._form', ['user' => $user])
@stop

