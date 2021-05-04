@extends('layouts.app')

@section('title'){{ $university->name }} |@endsection

@section('content')

@include('include.header')

<div class="flex justify-evenly h-container w-full">
    <div class="w-screen-3/5 max-w-screen-3/5 ">
        <div class="px-4 py-8">
        <div class="text-3xl font-semibold text-red-900 uppercase tracking-wide mb-4">{{ $university->name }}</div>
        <div class="text-2xl text-red-800 mb-3">{{ $university->native_name }}</div>
        <div class="text-xl text-red-800 mb-1">{{ $university->city->name }}, {{ __('countries.' . $university->city->country_id) }}</div>
        <div class="flex self-start mt-6">
            <a class="py-3 px-6 bg-red-600 hover:bg-red-700 rounded-full text-white mr-8" href="{{ $university->web }}" target="_blank">{{ __('Check the website') }}</a>
            <a class="py-3 px-6 bg-red-600 hover:bg-red-700 rounded-full text-white" href="{{ $university->xchangeLink }}" target="_blank">{{ __('University rating') }}</a>
        </div>
    </div>
        @if ($mobilities['searched'])
            <h2 class="mt-8 text-2xl font-semibold">{{ __('Courses for you') }}</h2>
            <div>
                @foreach ($mobilities['searched'] as $mobility)
                    <pairing :data="{{ json_encode($mobility) }}"></pairing>
                @endforeach
            </div>
        @endif
        <h2 class="mt-8 text-2xl font-semibold">{{ __('All courses') }}</h2>
        <div>
            @foreach ($mobilities['all'] as $mobility)
                <pairing :data="{{ json_encode($mobility) }}"></pairing>
            @endforeach
        </div>
    </div>

<div>
    <div class="flex-0 bg-red-100 px-8 py-6 mb-12 text-red-900 h-112 t-8 w-screen-1/4 max-w-screen-1/4 rounded-2xl">
        <h2 class="text-xl my-4 font-bold">{{ __('Hint for you') }}</h2>
        <span>
            <p class="my-4">Aktuální předměty poskytuje zahraniční univerzita na svých stránkách asi půl semestru před výjezdem.</p>
            <p class="my-4">Jakmile je zveřejní, podepíšeš studijní smlouvu, ve které spáruješ jejich předměty s těmi, co bys studoval doma.</p>
            <p class="my-4">Tady vidíš předměty, které spárovali studenti před tebou a jaké s nimi měli zkušenosti.</p>
        </span>
    </div>

    <div class="flex-0 bg-red-100 px-8 py-6 text-red-900 h-max-96 h-96 t-8 w-screen-1/4 max-w-screen-1/4 rounded-2xl">
        <h2 class="text-xl my-4 font-bold">{{ __('Hint for you') }}</h2>
        <span>
            <p class="my-4">Jakmile dorazíš do zahraničí, zvolíš si svůj rozvrh.</p>
            <p class="my-4">Některé předměty ale do něj nemusí sedět, nebo se neotevřou kvůli nízkému počtu studentů.</p>
            <p class="my-4">Proto můžeš studijní smlouvu do měsíce od příjezdu změnit a vybrat si předměty jiné a/nebo některé předměty zrušit.</p>
        </span>
    </div>
</div>
</div>
@endsection