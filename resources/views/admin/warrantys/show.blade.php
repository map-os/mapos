@extends('layouts.app')

@section('title', __('messages.view_warranty'))

@section('content_header')
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h2>{{ __('messages.view_warranty') }}</h2>
        </div>
    </div>
@stop

@section('content')
    <div class="p-3">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <td class="w-50">{{ __('messages.date_warranty') }}</td>
                    <td>{{ date('d/m/Y', strtotime($warranty->date_warranty)) }}</td>
                </tr>
                <tr>
                    <td class="w-50">{{ __('messages.ref_warranty') }}</td>
                    <td class="w-50">{{ $warranty->ref_warranty }}</td>
                </tr>
                <tr>
                    <td class="w-50">{{ __('messages.text_warranty') }}</td>
                    <td class="w-50">{{ $warranty->text_warranty }}</td>
                </tr>
                <tr>
                    <td class="w-50">{{ __('messages.user_id') }}</td>
                    <td class="w-50">{{ $warranty->user->name }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-3">
            <a href="{{ route('admin.warrantys.index') }}" class="btn btn-light"><i class="fa fa-arrow-left"></i>
                {{ __('messages.go_back') }}</a>
        </div>
    </div>
@stop
