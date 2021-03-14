@extends('layouts.app')

@include('include.header')

@section('content')
    <h2>Importing {{ $count }} mobilities</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="post" action="{{ route('save') }}">
        @csrf
        @foreach ($mobilities as $key => $mobility)
            <div>
                <input name="mobility[{{$key}}][student]" value="{{ $mobility->student->data }}">
                    <span style="color: red">{{ $mobility->student->message }}</span><br>
                <input name="mobility[{{$key}}][university]" value="{{ $mobility->university->data }}">
                    <span style="color: red">{{ $mobility->university->message }}</span><br>
                <input name="mobility[{{$key}}][city]" value="{{ $mobility->city }}">
                <input name="mobility[{{$key}}][arrival]" value="{{ $mobility->arrival->data }}"> - 
                <input name="mobility[{{$key}}][departure]" value="{{ $mobility->departure->data }}"><br>
                    <span style="color: red">{{ $mobility->arrival->message }}</span>
                    <span style="color: red">{{ $mobility->departure->message }}</span><br>
                <input name="mobility[{{$key}}][semester]"value="{{ $mobility->semester->data }}">
                <input name="mobility[{{$key}}][year]" value="{{ $mobility->year->data }}">
                    <span style="color: red">{{ $mobility->semester->message }}</span><br>
                    <span style="color: red">{{ $mobility->year->message }}</span>
                @foreach ($mobility->pairings as $index => $pairing)
                <div>
                    <input name="mobility[{{$key}}][pairing][{{$index}}][type]" value="{{ $pairing->data }}"> 
                    <input name="mobility[{{$key}}][pairing][{{$index}}][foreignCourse]" value="{{ $pairing->foreignCourse->data }}">
                    <input name="mobility[{{$key}}][pairing][{{$index}}][homeCourse][code]" value="{{ $pairing->homeCourse->data }}">
                    <input name="mobility[{{$key}}][pairing][{{$index}}][homeCourse][name]" value="{{ $pairing->homeCourse->name }}">
                        <span style="color: red">{{ $pairing->foreignCourse->message }}</span>
                        <span style="color: red">{{ $pairing->homeCourse->message }}</span>
                        <span style="color: red">{{ $pairing->message }}</span><br>
                    </div>
                    @endforeach
                <span style="color: red">{{ $mobility->message }}</span><br>
            </div>
            <br>
        @endforeach
        <input type="submit" value="{{ __('Confirm') }}">
    </form>
@endsection

