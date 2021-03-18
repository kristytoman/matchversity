@extends('layouts.app')

@section('content')
    <span>
        <h1>{{ __('Find the right course for you and go study abroad') }}</h1>
        <div>{{ __('Do you want to explore the world and get a lifetime exprience?') }}</div>
        <div>{{ __('Check the battles of your ancestors that can help you with your decisions.') }}</div>
        <a class="btn" href="/search" role="button">{{ __('Search for universities') }}</a>
    </span>
    <span>
        <img src="{{ asset('img/default.png') }}">
    </span>

    <div>
        <span>{{ $countUni }} {{ __('universities')}}</span>
        <span>{{ $countMobility }} {{ __('mobilities')}}</span>
        <span>{{ $countCourse }} {{ __('courses')}}</span>
    </div>
@endsection
