@extends('layouts.app')

@section('content')
    @include('include.header')
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <form method="post" action="{{ route('universities.index') }}" class="">
        @csrf
        <search-form :geography="{{ $geography }}" 
              :token="'{{ csrf_token() }}'" 
              :field-route="'{{ route('api.fields', ["", ""]) }}'" 
              :courses-route="'{{ route('api.courses', ["", ""]) }}'" 
              :countries-route="'{{ route('api.countries') }}'">
        </search-form>
        <label class="absolute bottom-8 right-12 w-20 h-20 rounded-full focus:outline-none justify-center items-center focus:shadow-outline bg-indigo-500 hover:bg-indigo-600 cursor-pointer inline-flex  p-2 shadow">
            <input type="submit" value=""/>
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                       d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </label>
    </form>
@endsection