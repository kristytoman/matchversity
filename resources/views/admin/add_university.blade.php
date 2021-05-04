@extends('layouts.app')

@section('title')Profil univerzity |@endsection

@section('content')

@include('include.admin')

    <h1 class="text-2xl font-semibold text-red-900 uppercase tracking-wide mb-6 ml-8 mt-4">{{ __('addUniversity.uniProfile') }} {{ $university->original_name }}</h1>
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <form id="add-university" method="POST" action="{{ route('admin.universities.update', $university) }}">
        @method('PUT')
        @csrf
        <div class="flex justify-evenly">
        <div class="ml-8 flex flex-col justify-evenly items-center  w-1/3 bg-red-500 px-8 py-6 rounded-2xl">
            <span class="flex flex-col justify-evenly w-full">
            <label for="university-name" class="text-white mb-2 mt-4">{{ __('addUniversity.uniName') }}</label>
                <input id="university-name" name="name" class="my-2 p-1 flex-1  bg-red-100 border-red-200 text-red-900  mx-3 flex border rounded"
                       value="{{ $university->name }}">
            </span>
            <span class="flex flex-col justify-evenly w-full">
                <label class="text-white mb-2 mt-4" for="native-name">{{ __('addUniversity.nativeName') }}</label>
                <input id="native-name" name="native_name" class="my-2 p-1 flex-1  bg-red-100 border-red-200 text-red-900  mx-3 flex border rounded"
                       value="{{ $university->native_name }}"><br>
                    </span>
                    <span class="flex flex-col justify-evenly w-full">
                        <label class="text-white mb-2 mt-4"  for="country">{{ __('addUniversity.country') }}</label>
                <input id="country" name="country" list="dl-country" class="my-2 p-1 flex-1  bg-red-100 border-red-200 text-red-900  mx-3 flex border rounded"
                       value="{{ $university->city ? $university->city->country_id : '' }}">
                    <datalist id="dl-country"></datalist><br>

                </span>
                <span class="flex flex-col justify-evenly w-full">
                    <label class="text-white mb-2 mt-4"  for="city">{{ __('addUniversity.city') }}</label>
                <input id="city" name="city" list="dl-city" class="my-2 p-1 flex-1  bg-red-100 border-red-200 text-red-900  mx-3 flex border rounded"
                       value="{{ $university->city ? $university->city->name : '' }}">
                    <datalist id="dl-city"></datalist><br>

                </span>
                <span class="flex flex-col justify-evenly w-full">
                    <label class="text-white mb-2 mt-4" for="web-link">{{ __('addUniversity.web') }}</label>
                <input id="web-link" name="web" type="text" class="my-2 p-1 flex-1  bg-red-100 border-red-200 text-red-900  mx-3 flex border rounded"
                       value="{{ $university->web }}"><br>

                    </span>
                    <span class="flex flex-col justify-evenly w-full">
                        <label class="text-white mb-2 mt-4" for="xchange">xchange ID</label>
                <input id="xchange" name="xchange" type="text" class="my-2 p-1 flex-1  bg-red-100 border-red-200 text-red-900  mx-3 flex border rounded"
                       value="{{ $university->xchange_id }}"/><br>
            
                    </span>
                    <span class="flex flex-col justify-evenly w-full">
                        <label class="text-white mb-2 mt-4" for="xchange">xchange link</label>
            <input id="xchange" name="xchange_link" type="text" class="my-2 p-1 flex-1  bg-red-100 border-red-200 text-red-900  mx-3 flex border rounded"
                   value="{{ $university->xchange_link }}"/><br>
        </div>
        <span class="text-2xl font-semibold text-red-900 uppercase tracking-wide mb-6 ml-8 mt-4">{{ __('addUniversity.or') }}</span>
        <div>
        
            <div class="ml-8 flex flex-col justify-evenly items-center bg-red-500 px-8 py-6 rounded-2xl">
            <label class="text-white mb-2 mt-4">{{ __('addUniversity.existingProfile') }}</label>
            <select name="connect_university" class="my-2 p-1 flex-1  bg-red-100 border-red-200 text-red-900  mx-3 flex border rounded">
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
            <div>
        </div>
    </div>
        <input type="submit" value="{{ __('addUniversity.save') }}" class="text-white font-semibold text-lg fixed bottom-8 right-12 focus:outline-none justify-center items-center focus:shadow-outline bg-red-700 hover:bg-red-600 cursor-pointer inline-flex px-4 py-6 rounded-2xl shadow">
    </form>
@endsection