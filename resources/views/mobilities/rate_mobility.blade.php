@extends('layouts.app')

@include('include.header')

@section('content')
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <div>
        <span>{{ $mobility->university->name }}</span>
        <span>{{ $mobility->university->native_name }}</span>
        <span>{{ $mobility->university->city->name }}, 
              {{ __('countries.'.$mobility->university->city->country_id) }}
        </span>
        @if ($mobility->is_summer)
            <span>{{ __('Summer') }}</span>
        @else
            <span>{{ __('Winter') }}</span>
        @endif
        <span>{{ $mobility->year }}</span>
    </div>

    <form id="form_rateMobility" method="POST" action="{{ route('mobilities.update', $mobility->id) }}">
        @csrf
        @method('PUT')
        @foreach ($mobility->pairings as $pair)
            <rating :pairing="{{ $pair }}" :reasons="{{ json_encode($reasons) }}"></rating>
        @endforeach
        <input type="submit" value="{{ __('Save my rating') }}">
    </form>
@endsection