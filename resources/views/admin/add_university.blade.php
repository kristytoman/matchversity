@extends('layouts.app')

@include('include.admin')

@section('content')
    <h1>{{ __('New university profile') }}</h1>
    <form id="form_addUni">
        @csrf
        <label for="in_UniName">{{ __('University name') }}</label>
            <input id="in_UniName" name="name"><br>

        <label for="in_origUniName">{{ __('Native name') }}</label>
            <input id="in_origUniName" name="originalName"><br>

        <label for="sel_uniContinent">{{ __('Continent') }}</label>
            <select id="sel_uniContent" name="continent">
            </select><br>
        <label for="in_uniCountry">{{ __('Country') }}</label>
            <input id="in_uniCountry" name="country" list="dl_country">
                <datalist id="dl_country"></datalist><br>
        <label for="in_uniCity">{{ __('City') }}</label>
            <input id="in_uniCity" name="city" list="dl_city">
                <datalist id="dl_city"></datalist><br>

        <label for="in_link">{{ __('Web page')}}</label>
            <input id="in_link" name="web" type="text"/><br>
        <label for="in_xchange"></label>
            <input id="in_xchange" name="xchange" type="text"/><br>
            
        <label for="in_expires">{{ __('Contract expiration') }}</label>
            <input for="in_expires" name="expiration" type="month"/><br>
        <input type="submit" value="{{ __('Create new university') }}">
    </form>
@endsection