@extends('layouts.app')

@include('include.header')

@section('content')
    @if ($mobilities == null || count($mobilities) == 0)
        <div>{{__('We haven\'t found any mobility.')}}</div>
    @else
        @foreach($mobilities as $mobility)
            <my-mobility :mobility="{{ $mobility }}"></my-mobility>
        @endforeach
    @endif
@endsection