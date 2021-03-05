@extends('layouts.app')

@include('include.header')

@section('content')
    <h2>Importing {{ $count }} mobilities</h2>
    @foreach ($mobilities as $mobility)
        <div>
            <input value="{{ $mobility->student->data }}">
            <span style="color: red">{{ $mobility->student->message }}</span><br>
            <input value="{{ $mobility->university->data }}">
            <span style="color: red">{{ $mobility->university->message }}</span><br>
            <input value="{{ $mobility->arrival->data }}"> - <input value="{{ $mobility->departure->data }}"><br>
            <span style="color: red">{{ $mobility->arrival->message }}</span><span style="color: red">{{ $mobility->departure->message }}</span><br>
            <input value="{{ $mobility->semester->data }}"><input value="{{ $mobility->year->data }}">
            <span style="color: red">{{ $mobility->semester->message }}</span><br>
            <span style="color: red">{{ $mobility->year->message }}</span>
            @foreach ($mobility->pairings as $pairing)
            <div>
                <input value="{{ $pairing->data }}"> 
                <input value="{{ $pairing->foreignCourse->data }}"><input value="{{ $pairing->homeCourse->data }}">
                <input value="{{ $pairing->homeCourse->name }}">
                <span style="color: red">{{ $pairing->foreignCourse->message }}</span>
                <span style="color: red">{{ $pairing->homeCourse->message }}</span>
                <span style="color: red">{{ $pairing->message }}</span><br>
                <input value="{{ $pairing->degree->data }}">
                <span style="color: red">{{ $pairing->degree->message }}</span><br>
                <input value="{{ $pairing->field->data }}">
                <span style="color: red">{{ $pairing->field->message }}</span><br>
                <input value="{{ $pairing->faculty->data }}">
                <span style="color: red">{{ $pairing->faculty->message }}</span><br>
            </div>
            @endforeach
        </div>
        <br>
    @endforeach

@endsection

