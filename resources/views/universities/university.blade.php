@extends('layouts.app')

@include('include.header')

@section('content')
    <div>
        <span>{{ $university->name }}</span>
        <div>{{ $university->native_name }}</div>
        <div>{{ $university->city->name }}, {{ __('countries.' . $university->city->country_id) }}
        <div>
            <a href="{{ $university->web }}" target="_blank">{{ __('Check the website') }}</a>
            <a href="{{ $university->web }}" target="_blank">{{ __('University rating') }}</a>
        </div>
        @if ($mobilities['searched'])
            <h2>{{ __('Courses for you') }}</h2>
            <div>
                @foreach ($mobilities['searched'] as $mobility)
                    <pairing :data="{{ json_encode($mobility) }}"></pairing>
                @endforeach
            </div>
        @endif
        <h2>{{ __('All courses') }}</h2>
        <div>
            @foreach ($mobilities['all'] as $mobility)
                <pairing :data="{{ json_encode($mobility) }}"></pairing>
            @endforeach
        </div>
    </div>
@endsection