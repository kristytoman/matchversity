@extends('layouts.app')

@include('include.header')

@section('content')
    <h2>Importing {{ $count }} mobilities</h2>
    @foreach ($mobilities as $mobility)
        <div>
        <input value="{{ $mobility->arrival->data }}"> - <input value="{{ $mobility->departure->data }}"><br>
        <input value="{{ $mobility->semester->data }}"><input value="{{ $mobility->year->data }}">
        @foreach ($mobility->pairings as $pairing)
        <div>
            <input value="{{ $pairing->foreignCourse->data }}"><input value="{{ $pairing->homeCourse->data }}">
            <input value="{{ $pairing->type }}"> 
        </div>
        @endforeach
    
        </div>
        <br>
    @endforeach
@endsection

