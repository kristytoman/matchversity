@extends('layouts.app')

@include('include.header')

@section('content')
    <a href="{{ route('mobilities.create') }}">Přidat výjezd</a>
    @if ($mobilities == null || count($mobilities) == 0)
        <div>Nenalezen žádný výjezd.</div>
    @else
        @foreach($mobilities as $mobility)
        <a href="{{ route('mobilities.show', $mobility->id )}}"><div id="mob-{{ $mobility->id }}">
            <span>{{ $mobility->university->name }}</span>
            <span>{{ $mobility->university->location->city }}, {{ $mobility->university->location->country }}</span>
        @endforeach
        </div></a>
    @endif
@endsection