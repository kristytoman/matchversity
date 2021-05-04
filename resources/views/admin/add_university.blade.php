@extends('layouts.app')

@section('title'){{ __('addUniversity.uniProfile') }} {{ $university->original_name }} |@endsection

@section('content')

    @include('include.admin')

    <h1 class="text-2xl font-semibold text-red-900 uppercase tracking-wide
               mb-6 ml-8 mt-4">
        {{ __('addUniversity.uniProfile') }} {{ $university->original_name }}
    </h1>
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <form id="add-university" method="POST"
          action="{{ route('admin.universities.update', $university) }}">
        @method('PUT')
        @csrf
        <div class="flex justify-evenly">
            <div class="flex flex-col justify-evenly items-center
                        ml-8 px-8 py-6 w-1/3 bg-red-500 rounded-2xl">
                <span class="flex flex-col justify-evenly w-full">
                    <label for="university-name"
                           class="text-white mb-2 mt-4">
                           {{ __('addUniversity.uniName') }}
                    </label>
                    <input id="university-name" name="name"
                           class="flex-1 bg-red-100 border-red-200 text-red-900
                                  mx-3 my-2 p-1 border rounded"
                           value="{{ $university->name }}">
                </span>
                <span class="flex flex-col justify-evenly w-full">
                    <label for="native-name"
                           class="text-white mb-2 mt-4">
                           {{ __('addUniversity.nativeName') }}
                    </label>
                    <input id="native-name" name="native_name"
                           class="flex-1 bg-red-100 border-red-200 text-red-900
                                  mx-3 my-2 p-1 border rounded"
                           value="{{ $university->native_name }}">
                </span>
                <span class="flex flex-col justify-evenly w-full">
                    <label for="country"
                          class="text-white mb-2 mt-4">
                          {{ __('addUniversity.country') }}
                    </label>
                    <input id="country" name="country" list="dl-country"
                           class="flex-1 bg-red-100 border-red-200 text-red-900
                                   mx-3 my-2 p-1 border rounded"
                           value="{{ $university->city ? $university->city->country_id : '' }}">
                           <datalist id="dl-country"></datalist>
                </span>
                <span class="flex flex-col justify-evenly w-full">
                    <label for="city"
                           class="text-white mb-2 mt-4">
                           {{ __('addUniversity.city') }}
                    </label>
                    <input id="city" name="city" list="dl-city"
                           class="flex-1 bg-red-100 border-red-200 text-red-900
                                 mx-3 my-2 p-1 border rounded"
                           value="{{ $university->city ? $university->city->name : '' }}">
                           <datalist id="dl-city"></datalist>
                </span>
                <span class="flex flex-col justify-evenly w-full">
                    <label for="web-link"
                          class="text-white mb-2 mt-4">
                          {{ __('addUniversity.web') }}
                    </label>
                    <input id="web-link" name="web" type="text"
                           class="flex-1 bg-red-100 border-red-200 text-red-900
                                  mx-3 my-2 p-1 border rounded"
                           value="{{ $university->web }}">
                </span>
                <span class="flex flex-col justify-evenly w-full">
                    <label for="xchange"
                           class="text-white mb-2 mt-4">
                    xchange ID
                    </label>
                    <input id="xchange" name="xchange" type="text"
                           class="my-2 p-1 flex-1 bg-red-100 border-red-200 text-red-900
                                  mx-3 my-2 p-1 border rounded"
                           value="{{ $university->xchange_id }}"/>
                </span>
                <span class="flex flex-col justify-evenly w-full">
                    <label for="xchange"
                          class="text-white mb-2 mt-4">
                       xchange link
                    </label>
                    <input id="xchange" name="xchange_link" type="text"
                           class="flex-1 bg-red-100 border-red-200 text-red-900
                                  mx-3 my-2 p-1 border rounded"
                           value="{{ $university->xchange_link }}">
                </span>
            </div>
            <span class="text-2xl font-semibold text-red-900 uppercase tracking-wide
                         mb-6 ml-8 mt-4">
                {{ __('addUniversity.or') }}
            </span>
            <div>
                <div class="flex flex-col justify-evenly items-center
                            ml-8 px-8 py-6  bg-red-500 rounded-2xl">
                    <label class="text-white mb-2 mt-4">
                        {{ __('addUniversity.existingProfile') }}
                    </label>
                    <select name="connect_university"
                            class="flex-1 bg-red-100 border-red-200 text-red-900
                                mx-3 my-2 p-1 border rounded">
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
            </div>
        </div>
        <input type="submit" value="{{ __('addUniversity.save') }}"
               class="fixed bottom-8 right-12 inline-flex
                      px-4 py-6  bg-red-700 rounded-2xl shadow
                      text-white font-semibold text-lg
                      focus:outline-none focus:shadow-outline
                      hover:bg-red-600 cursor-pointer">
    </form>
@endsection