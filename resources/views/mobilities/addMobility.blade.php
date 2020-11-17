@extends('layouts.app')

@include('include.header')

@section('content')
    <h2>Nový výjezd</h2>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="form_addMobility" method="post" action="{{ route('mobilities.store') }}">
            @csrf
            <div id="div_university">
                <label for="sel_uniID" require>Univerzita</label>
                    <select id="sel_uniID" name="uniID">
                        @foreach ($universities as $uni)
                            <option value="{{ $uni->id }}">{{ $uni->name }} | {{ $uni->location->city }}, {{ $uni->location->country }}</option>
                        @endforeach
                    </select>
                    <input id="btn_addUni" type="button" onclick="addUni()" value="Přidat univerzitu"><br>
                <span id="uniform" style="display:none;">
                    @include('include.uniform')
                </span>
            </div>
            <div id="div_mobility">
                <fieldset>
                    <legend>Semestr</legend>
                    <input id="chB_summer" name="semester[summer]" type="checkbox" onclick="displaySemester('summer');" value="{{ $years[0] }}">
                    <label for="chB_summer">Letní</label>
                    <input id="chB_winter" name="semester[winter]" type="checkbox" onclick="displaySemester('winter');" value="{{ $years[0] }}">
                    <label for="chB_winter">Zimní</label>
                </fieldset>
            
            <div id="div_winterPairings" style="display:none;">
                <label>Rok<label>
                    <select id="winter" name="winter" onchange="changeYear('winter')">
                        @foreach ($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select><br>
                <label>Párování</label>
                <input type="button" onclick="appendPairing('winter')" value="Přidat párování"><br>
                <label>Zahraniční předmět</label><br>
                <label for="in_winterForeignCode">Kód</label>
                <input id="in_winterForeignCode" type="text"/><br>
                <label for="in_winterForeignName">Název</label>
                <input id="in_winterForeignName" type="text"/><br>
                
                <label>Domácí předmět</label><br>
                <label for="in_winterHomeCode">Kód</label>
                <input id="in_winterHomeCode" type="text"/><br>
                <label for="in_winterHomeName">Název</label>
                <input id="in_winterHomeName" type="text"/><br>
                
                <div id="div_addedwinterPairings"></div>
            </div>
            <div id="div_summerPairings"style="display:none;">
                <label>Rok<label>
                    <select id="summer" name="summer" onchange="changeYear('summer')">
                        @foreach ($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select><br>
                <label>Párování</label>
                <input type="button" onclick="appendPairing('summer')" value="Přidat párování"><br>
                <label>Zahraniční předmět</label><br>
                <label for="in_summerForeignCode">Kód</label>
                <input id="in_summerForeignCode" type="text"/><br>
                <label for="in_summerForeignName">Název</label>
                <input id="in_summerForeignName" type="text"/><br>
                
                <label>Domácí předmět</label><br>
                <label for="in_summerHomeCode">Kód</label>
                <input id="in_summerHomeCode" type="text"/><br>
                <label for="in_summerHomeName">Název</label>
                <input id="in_summerHomeName" type="text"/><br>
                
                <div id="div_addedsummerPairings"></div>
            </div>
        </div>
            <input type="submit" value="Přidat výjezd"/>       
        </form>
@endsection

@section('scripts')
    <script src="{{ mix('/js/mobility.js') }}"></script>
@endsection