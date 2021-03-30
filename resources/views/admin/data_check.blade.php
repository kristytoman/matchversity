@extends('layouts.app')

@include('include.admin')

@section('content')
    <h2>Importing {{ $count }} mobilities</h2>
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>  
    <form method="post" action="{{ route('admin.mobilities.store') }}">
        @csrf
        @foreach ($mobilities as $key => $mobility)
            <form-mobility :mobility="{{ $mobility }}" :key="{{ $key }}" :inputName="mobility[{{ $key }}]"></form-mobility>
        @endforeach
        <input type="submit" value="{{ __('Confirm') }}">
    </form>
@endsection

