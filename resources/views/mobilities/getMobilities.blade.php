@extends('layouts.app')

@include('include.header')

@section('content')
    <a href="{{ route('mobilities.create') }}">Přidat výjezd</a>
@endsection