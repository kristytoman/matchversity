@extends('layouts.app')

@section('title'){{ __('Mobility rating') }} |@endsection

@section('content')

    @include('include.header')
    
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <div class="ml-10 flex flex-col">
        <span name="university-name" class="text-3xl font-semibold text-red-900 uppercase tracking-wide mb-4">
            {{ $mobility->university->name }}
        </span>
        <span class="text-2xl text-red-800 mb-3">
            {{ $mobility->university->native_name }}
        </span>
        <span class="text-xl text-red-800 mb-1">
            {{ $mobility->university->city->name }}, 
              {{ __('countries.'.$mobility->university->city->country_id) }}
        </span>
        <span>
            @if ($mobility->is_summer)
                <span class="text-xl text-red-800 mb-1">
                    {{ __('Summer') }}
                </span>
            @else
                <span class="text-xl text-red-800 mb-1">
                    {{ __('Winter') }}
                </span>
            @endif
            <span class="text-xl text-red-800 mb-1">
                {{ $mobility->year }}
            </span>
        </span>
    </div>

    <form id="form_rateMobility" method="POST" 
          action="{{ route('mobilities.update', $mobility->id) }}">
        @csrf
        @method('PUT')
        <div class="flex overflow-x-scroll  hide-scroll-bar
                    pb-10 px-10  w-full">
            <div class="flex flex-nowrap max-w-screen-3/4 ml-10 space-x-16 ">
                @foreach ($mobility->pairings as $pair)
                    <rating :pairing="{{ $pair }}" 
                            :reasons="{{ json_encode($reasons) }}">
                    </rating>
                @endforeach
            </div>
        </div>
        <input type="submit" 
               class="py-3 px-6 ml-10 bg-red-600 justify-end 
                      hover:bg-red-800 rounded-full text-white" 
               value="{{ __('Save my rating') }}">
    </form>
    @include('include.footer')
@endsection