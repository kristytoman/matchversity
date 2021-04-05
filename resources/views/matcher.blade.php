@extends('layouts.app')

@include('include.header')

@section('content')
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <form method="post" action="{{ route('universities.index') }}">
        @csrf
        <search-form :geography="{{ $geography }}" 
              :token="'{{ csrf_token() }}'" 
              :field-route="'{{ route('api.fields', ["", ""]) }}'" 
              :courses-route="'{{ route('api.courses', ["", ""]) }}'" 
              :countries-route="'{{ route('api.countries') }}'">
        </search-form>
        <input type="submit" value="{{ __('Search') }}"/>
    </form>
@endsection