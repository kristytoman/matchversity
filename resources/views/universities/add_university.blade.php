@extends('layouts.app')

@include('include.header')

@section('content')
    <h1>{{ __('New university profile') }}</h1>
    <form id="form_addUni">
        @csrf
        @include('include.uniform')
        <input type="submit" value="{{ __('Create new university') }}">
    </form>
@endsection