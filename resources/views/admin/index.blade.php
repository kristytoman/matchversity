@extends('layouts.app')

@include('include.header')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   <form method="POST" enctype="multipart/form-data" action="{{ route('import') }}">
       @csrf
       <label>{{__('Mobilities')}}: </label>
       <input type="file" name="file" accept=".xlsx"/>
       <input type="submit" />
   </form>
@endsection