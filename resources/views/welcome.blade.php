@extends('layouts.app')

@section('content')
    <div class="title">
        <h1>Matchversity</h1>
        <a href="matcher" role="button">{{ __('Search for universities') }}</a>
        <a href="{{ route('mobilities.index') }}" role="button">{{ __('Rate mobility') }}</a>
    </div>
    <div class="about">
        <h2>O Matchversity</h2>
        <span>
            <p>
                Aplikace umožňuje studentům UTB prohlížet uskutečněné výjezdy na zahraniční studijní pobyt.
                Abychom usnadnili proces vyhledávávání zahraničních předmětů ke spárování s předměty domácími,
                zpřístupnili jsme pro vás informace o předchozích spárování. 
            </p>
            <p>
                Studenti, kteří se již výjezdu účastnili, mají možnost poskytnout feedback k absolvovaným
                předmětům, a tím pomoct s rozhodováním zájemcům.
            </p>
        </span>
    </div>
@endsection
