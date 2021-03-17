@extends('layouts.app')

@include('include.header')

@section('content')
    <a href="{{ route('mobilities.create') }}">{{ __('Add mobility')}}</a>
    @if ($mobilities == null || count($mobilities) == 0)
        <div>{{__('We haven\'t found any mobility.')}}</div>
    @else
        @foreach($mobilities as $mobility)
        <a href="{{ route('mobilities.show', $mobility->id )}}">
            <div id="mob-{{ $mobility->id }}">
                <span>{{ $mobility->id }}</span>
                <span>{{ $mobility->arrival }}</span>
                <span>{{ $mobility->departure }}</span>
                <span>{{ $mobility->university->name}}</span>
                @if ($mobility->university->city)
                <span>{{ $mobility->university->city->name}}</span>
                <span>{{ __('countries.'.$mobility->university->city->country_id) }}</span>
                @endif
            </div>
        @endforeach
        </div></a>
    @endif
@endsection