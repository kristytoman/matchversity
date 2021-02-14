@extends('layouts.app')

@include('include.header')

@section('content')
   <form method="POST" enctype="multipart/form-data" action="{{ route('import') }}">
       @csrf
       <label>{{__('Mobilities')}}: </label>
       <input type="file" name="file" accept=".xlsx"/>
       <input type="submit" />
   </form>
@endsection