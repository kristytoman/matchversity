@extends('layouts.app')

@include('include.header')

@section('content')
<div>
    <span>{{ $mobility->university->name }}</span>
    <span>{{ $mobility->university->native_name }}</span>
    <span>{{ $mobility->university->city->name }}, {{ __('countries.' . $mobility->university->city->country_id) }}</span>
    @if ($mobility->is_summer)
    <span>{{ __('Summer') }}</span>
    @else
    <span>{{ __('Winter') }}</span>
    @endif
    <span>{{ $mobility->year }}</span>
    @foreach ($mobility->pairings as $pair)
        <div><span>{{ $pair->foreignCourse->code }}</span>
            <span>{{ $pair->foreignCourse->name }}</span>
            <span></span>
            <span>{{ $pair->homeCourse->code }}</span>
            <span>{{ $pair->homeCourse->name }}</span>
        </div>
    @endforeach
    <a href="{{ route('mobilities.edit', $mobility->id) }}">{{__('Rate mobility')}}</a>
</div>
<div>
</div>
@endsection