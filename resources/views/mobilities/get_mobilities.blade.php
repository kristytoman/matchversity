@extends('layouts.app')

@include('include.header')

@section('content')
    <a href="{{ route('mobilities.create') }}">{{ __('Add mobility')}}</a>
    @if ($mobilities == null || count($mobilities) == 0)
        <div>{{__('We haven\'t found any mobility.')}}</div>
    @else
        @foreach($mobilities as $mobility)
        <a href="{{ route('mobilities.show', $mobility->id )}}"><div id="mob-{{ $mobility->id }}">
        @endforeach
        </div></a>
    @endif
@endsection