@extends('layouts.app')

@include('include.admin')

@section('content')
    <h1>{{ __('addUniversity.uniProfile') }} {{ $university->original_name }}</h1>
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <form id="add-university" method="POST" action="{{ route('admin.universities.update', $university) }}">
        @method('PUT')
        @csrf
        <div>
            <label for="university-name">{{ __('addUniversity.uniName') }}</label>
                <input id="university-name" name="name" 
                       value="{{ $university->name }}"><br>

            <label for="native-name">{{ __('addUniversity.nativeName') }}</label>
                <input id="native-name" name="native_name" 
                       value="{{ $university->native_name }}"><br>

            <label for="country">{{ __('addUniversity.country') }}</label>
                <input id="country" name="country" list="dl-country" 
                       value="{{ $university->city ? $university->city->country_id : '' }}">
                    <datalist id="dl-country"></datalist><br>

            <label for="city">{{ __('addUniversity.city') }}</label>
                <input id="city" name="city" list="dl-city" 
                       value="{{ $university->city ? $university->city->name : '' }}">
                    <datalist id="dl-city"></datalist><br>

            <label for="web-link">{{ __('addUniversity.web') }}</label>
                <input id="web-link" name="web" type="text" 
                       value="{{ $university->web }}"><br>

            <label for="xchange">xchange ID</label>
                <input id="xchange" name="xchange" type="text" 
                       value="{{ $university->xchange_id }}"/><br>
            
            <label for="xchange">xchange link</label>
            <input id="xchange" name="xchange_link" type="text" 
                   value="{{ $university->xchange_link }}"/><br>
        </div>
        <div>
            <span>{{ __('addUniversity.or') }}
        
            <label>{{ __('addUniversity.existingProfile') }}</label>
            <select name='connect_university'>
                <option value=""></option>
                @foreach ($universities as $uni)
                    @if($uni->name)
                        <option value="{{ $uni->id }}">
                            {{ $uni->name }}, {{ $uni->city ? $uni->city->name : '' }}, 
                            {{ $uni->city ? __('countries.' . $uni->city->country_id) :'' }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <input type="submit" value="{{ __('addUniversity.save') }}">
    </form>
@endsection