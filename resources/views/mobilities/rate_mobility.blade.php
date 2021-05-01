@extends('layouts.app')

@include('include.header')

@section('content')
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <div class="ml-10 flex flex-col">
        <span class="text-3xl font-semibold text-red-900 uppercase tracking-wide mb-4">{{ $mobility->university->name }}</span>
        <span class="text-2xl text-red-800 mb-3">{{ $mobility->university->native_name }}</span>
        <span class="text-xl text-red-800 mb-1">{{ $mobility->university->city->name }}, 
              {{ __('countries.'.$mobility->university->city->country_id) }}
        </span class="text-xl text-red-800 mb-1">
        <span>
        @if ($mobility->is_summer)
            <span class="text-xl text-red-800 mb-1">{{ __('Summer') }}</span>
        @else
            <span class="text-xl text-red-800 mb-1">{{ __('Winter') }}</span>
        @endif
        <span class="text-xl text-red-800 mb-1">{{ $mobility->year }}</span>
        </span>
    </div>

    <form id="form_rateMobility" method="POST" action="{{ route('mobilities.update', $mobility->id) }}">
        @csrf
        @method('PUT')
        <div class="flex overflow-x-scroll pb-10 hide-scroll-bar w-screen max-w-screen px-10">
            <div class="flex flex-nowrap lg:ml-40 md:ml-20 ml-10 space-x-16 ">
        @foreach ($mobility->pairings as $pair)
            <rating :pairing="{{ $pair }}" :reasons="{{ json_encode($reasons) }}"></rating>
        @endforeach
            </div>
        </div>
        <input type="submit" class="py-3 px-6 ml-10 bg-red-600 justify-end hover:bg-red-800 rounded-full text-white" value="{{ __('Save my rating') }}">
    </form>
@endsection