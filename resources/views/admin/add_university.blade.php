@extends('layouts.app')

@include('include.admin')

@section('content')
    <h1>{{ __('University profile for') }} {{ $university->original_name }}</h1>
    <errors :errors="{{ $errors->all() }}"></errors>
    <form id="add-university" method="POST" action="{{ route('admin.universities.update', $university) }}">
        @method('PUT')
        @csrf
        <label for="university-name">{{ __('University name') }}</label>
            <input id="university-name" name="name" value="{{ $university->name }}"><br>

        <label for="native-name">{{ __('Native name') }}</label>
            <input id="native-name" name="native_name" value="{{ $university->native_name }}"><br>

        <label for="country">{{ __('Country') }}</label>
            <input id="country" name="country" list="dl-country" value="{{ $university->city ? $university->city->country_id : '' }}">
                <datalist id="dl-country"></datalist><br>

        <label for="city">{{ __('City') }}</label>
            <input id="city" name="city" list="dl_city" value="{{ $university->city ? $university->city->name : '' }}">
                <datalist id="dl_city"></datalist><br>

        <label for="web-link">{{ __('Web page')}}</label>
            <input id="web-link" name="web" type="text" value="{{ $university->web }}"><br>


        <label for="xchange">xchange ID</label>
            <input id="xchange" name="xchange" type="text" value="{{ $university->xchange }}"/><br>
            
       
        <label>{{ __('Or connect with another profile')}}</label>
        <select name='connect_university'>
            <option value=""></option>
            @foreach ($universities as $uni)
            @if($uni->name)
                <option value="{{ $uni->id }}">{{ $uni->name }}, {{ $uni->city ? $uni->city->name : '' }}, {{ $uni->city? __('countries.'.$uni->city->country_id):''}}</option>
            @endif
            @endforeach
        </select>
        <input type="submit" value="{{ __('Save profile') }}">
    </form>
@endsection