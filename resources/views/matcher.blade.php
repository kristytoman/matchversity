@extends('layouts.app')

@include('include.header')

@section('content')
    <form method="post" action="{{ route('universities.index') }}">
        @csrf
        <label>{{ __('Semester') }}:</label>
        <select>
            <option>{{ __('Doesn\'t matter') }}</option>
            <option>{{ __('Winter') }}</option>
            <option>{{ __('Summer') }}</option>
        </select>
        <br>
        <fieldset>
            <legend>Kontinent:</legend>
            <input type="checkbox" value="Afrika" checked>
            <input type="checkbox" value="Asie " checked>
            <input type="checkbox" value="Austrálie a oceánie" checked>
            <input type="checkbox" value="Evropa" checked>
            <input type="checkbox" value="Jižní Amerika" checked>
            <input type="checkbox" value="Severní Amerika" checked>
        </fieldset>
        <input type="submit" value="{{ __('Search') }}"/>
    </form>
@endsection