@extends('layouts.app')

@include('include.admin')

@section('content')
    <h2>Importing {{ $count }} mobilities</h2>
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>  
    <form method="post" action="{{ route('admin.mobilities.store') }}">
        @csrf
            <form-mobility v-for="(mobility, index) in {{ json_encode($mobilities) }}" :mobility="mobility" :input-name="'mobility[' + index + ']'"></form-mobility>
        <input type="submit" value="{{ __('Confirm') }}">
    </form>
@endsection

