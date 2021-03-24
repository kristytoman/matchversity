@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('universities.index') }}">
        @csrf
        <h3>{{ __('Winter') }}</h3>
        <h3>{{ __('Summer') }}</h3>
        <br>
        <study-info></study-info>
        <country-select :geography="{{ $geography }}"></country-select>
        <input type="submit" value="{{ __('Search') }}"/>
    </form>
@endsection