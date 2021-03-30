@extends('layouts.app')

@include('include.header')

@section('content')
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <div>
        <span>{{ $mobility->university->name }}</span>
        <span>{{ $mobility->university->native_name }}</span>
        <span>{{ $mobility->university->city->name }}, {{ __('countries.'.$mobility->university->city->country_id) }}</span>
        @if ($mobility->is_summer)
        <span>{{ __('Summer') }}</span>
        @else
        <span>{{ __('Winter') }}</span>
        @endif
        <span>{{ $mobility->year }}</span>
    </div>

    <form id="form_rateMobility" method="patch" action="{{ route('mobilities.update', $mobility->id) }}">
        @csrf
        @foreach ($mobility->pairings as $pair)
            <div><span>{{ $pair->foreignCourse->code }}</span>
                <span>{{ $pair->foreignCourse->name }}</span>
                <span></span>
                <span>{{ $pair->homeCourse->code }}</span>
                <span>{{ $pair->homeCourse->name }}</span>
            </div>
            <fieldset>
                <input type="radio" name="rate[{{ $pair->foreignCourse->code }}]" value="0">
                <input type="radio" name="rate[{{ $pair->foreignCourse->code }}]" value="1">
                <input type="radio" name="rate[{{ $pair->foreignCourse->code }}]" value="2">
                <input type="radio" name="rate[{{ $pair->foreignCourse->code }}]" value="3">
                <input type="radio" name="rate[{{ $pair->foreignCourse->code }}]" value="4">
                <input type="radio" name="rate[{{ $pair->foreignCourse->code }}]" value="5">
            </fieldset>
            <input type="checkbox" onclick="#"><label>{{ __('Deleted') }}</label>
            <select id="sel-{{ $pair->foreignCourse->code }}">
                @foreach ($reasons as $reason)
                <option name="unlinked[{{ $pair->foreignCourse->code }}]" value="{{ $reason->id }}">{{ $reason->reason }}</option>
                @endforeach
            </select>
            <input id="input-{{ $pair->foreignCourse->code }}" type="text" name="new[{{ $pair->foreignCourse->code }}]">
        @endforeach
        <input type="submit" value="{{ __('Save my rating') }}">
    </form>
@endsection