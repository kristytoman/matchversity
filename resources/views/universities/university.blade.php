@extends('layouts.app')

@include('include.header')

@section('content')
    <div>
        <span style="font-size:2em">{{ $university->name }}</span>
        <div>{{ $university->native_name }}</div>
        <div>{{ $university->city->name }}, {{ __('countries.' . $university->city->country_id) }}
        <div>
            <a href="{{ $university->web }}" target="_blank">{{ __('Check the website') }}</a>
            <a href="{{ $university->web }}" target="_blank">{{ __('University rating') }}</a>
        </div>
    </div>
@endsection