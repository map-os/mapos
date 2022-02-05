@extends('layouts.app')

@section('title', __('messages.view_user'))

@section('content_header')

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h2>{{ __('messages.view_user') }}</h2>
        </div>
    </div>

@stop

@section('content')
    <div class="p-3">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <td class="w-50">{{ __('messages.name') }}</td>
                <td class="w-50">{{ $user->name }}</td>
            </tr>
            <tr>
                <td class="w-50">{{ __('messages.document_number') }}</td>
                <td class="w-50">{{ $user->email }}</td>
            </tr>
            <tr>
                <td class="w-50">{{ __('messages.created_at') }}</td>
                <td class="w-50">@datetime($user->created_at)</td>
            </tr>
            <tr>
                <td class="w-50">{{ __('messages.updated_at') }}</td>
                <td class="w-50">@datetime($user->updated_at)</td>
            </tr>
            </tbody>
        </table>

        <div class="mt-3">
            <a href="{{ route('admin.users.index') }}" class="btn btn-light"> <i class="fa fa-arrow-left"></i> {{ __('messages.go_back') }}</a>
        </div>

    </div>
@stop

@section('js')
@endsection
