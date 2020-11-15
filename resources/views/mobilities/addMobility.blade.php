@extends('layouts.app')

@include('include.header')

@section('content')
    <form id="form_addMobility" method="post" action="{{ route('mobilities.store') }}">
        @csrf
        <div id="div_university">
            <label for="in_Uni" require>Univerzita</label>
                <input id="in_uniName" name="name" list="dl_universities" onchange="uniset();">
                    <datalist id="dl_universities">
                        @foreach ($universities as $uni)
                            <option value="{{ $uni->name }}" label="{{ $uni->name }} | {{ $uni->location->city }}, {{ $uni->location->country }}">
                        @endforeach
                    </datalist><br>
            <span id="uniform" style="display:none;">
                @include('include.uniform')
            </span>
        </div>

        <label>Párování</label>
            <input type="button" onclick="appendPairing()" value="Přidat párování"><br>
            <label>Zahraniční předmět</label><br>
                <label for="in_foreignCode">Kód</label>
                    <input id="in_foreignCode" type="text"/><br>
                <label for="in_foreignName">Název</label>
                    <input id="in_foreignName" type="text"/><br>

            <label>Domácí předmět</label><br>
                <label for="in_homeCode">Kód</label>
                    <input id="in_homeCode" type="text"/><br>
                <label for="in_homeName">Název</label>
                    <input id="in_homeName" type="text"/><br>

        <div id="div_addedPairings"></div>

        <input type="submit" value="Přidat výjezd"/>       
    </form>
@endsection

@section('scripts')
    <script src="{{ mix('/js/mobility.js') }}"></script>
@endsection