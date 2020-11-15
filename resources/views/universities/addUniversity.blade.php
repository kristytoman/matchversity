@extends('layouts.app')

@include('include.header')

@section('content')
    <h1>Nový profil univerzity</h1>
    <form id="form_addUni">
        @csrf
        <label for="in_uniName">Název univerzity</label>
            <input id="in_uniName" type="text"><br>
        @include('include.uniform')
        <input type="submit" value="Vytvořit profil">
    </form>
@endsection