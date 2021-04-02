@extends('layouts.app')

@include('include.header')

@section('content')
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <form method="post" action="{{ route('universities.index') }}">
        @csrf
        <h3>{{ __('Winter') }}</h3>
        <h3>{{ __('Summer') }}</h3>
        <br>
        <study-info :token="'{{ csrf_token() }}'" :field-route="'{{ route('api.fields', ["", ""]) }}'" :courses-route="'{{ route('api.courses', ["", ""]) }}'" :countries-route="'{{ route('api.countries') }}'"></study-info>
        <country-select :geography="{{ $geography }}"></country-select>
        <input type="submit" value="{{ __('Search') }}"/>
    </form>
@endsection