@extends('layouts.app')

@include('include.header')

@section('content')
<div>
    <span>{{ $mobility->university->name }}</span>
    <span>{{ $mobility->university->originalName }}</span>
    <span>{{ $mobility->university->city->name }}, {{$mobility->university->city->country }}</span>
    <span>{{ $duration }}</span>
    @foreach ($mobility->pairings as $pair)
        <div><span>{{ $pair->foreignCourse->code }}</span>
            <span>{{ $pair->foreignCourse->name }}</span>
            <span></span>
            <span>{{ $pair->homeCourse->code }}</span>
            <span>{{ $pair->homeCourse->name }}</span>
        </div>
    @endforeach
    <a href="{{ route('mobilities.edit', $mobility->id) }}">Ohodnotit</a>
</div>
<div>
</div>
@endsection