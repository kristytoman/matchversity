@extends('layouts.app')

@section('title'){{ __('dataCheck.title') }} |@endsection

@section('content')

    @include('include.admin')

    <h2>{{ __('dataCheck.import') }} {{ $count }} {{ __('dataCheck.mobilities') }}</h2>
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <span>{{ __('dataCheck.check') }}</span>
    <form method="post" action="{{ route('admin.mobilities.store') }}">
        @csrf
        <form-mobility v-for="(mobility, index) in {{ json_encode($mobilities) }}"
                       :mobility="mobility" :input-name="'mobility[' + index + ']'">
        </form-mobility>
        <input type="submit" value="{{ __('dataCheck.confirm') }}">
    </form>
@endsection

