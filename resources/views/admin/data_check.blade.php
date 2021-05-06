@extends('layouts.app')

@section('title'){{ __('dataCheck.title') }} |@endsection

@section('content')

    @include('include.admin')

    <h2 class="text-2xl font-semibold text-red-900 uppercase tracking-wide
               mb-6 ml-8 mt-4">
        {{ __('dataCheck.import') }} {{ $count }} {{ __('dataCheck.mobilities') }}
    </h2>

    <errors :errors="{{ json_encode($errors->all()) }}"></errors>

    <span class="text-lg font-semibold
                 mb-6 ml-8 mt-4">
        {{ __('dataCheck.check') }}
    </span>
    <form method="post" action="{{ route('admin.mobilities.store') }}"
          class="flex place-items-center flex-col mt-8 w-screen">
        @csrf
        <form-mobility v-for="(mobility, index) in {{ json_encode($mobilities) }}"
                       :mobility="mobility" :input-name="'mobility[' + index + ']'">
        </form-mobility>
        <input type="submit"
               value="{{ __('dataCheck.confirm') }}"
               class="flex-none max-w-32
                      ml-8 px-4 py-2 bg-red-500 text-white border rounded-md
                      hover:bg-red-300 hover:border-red-500 hover:text-red-900">
    </form>
@endsection

