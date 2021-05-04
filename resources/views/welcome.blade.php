@extends('layouts.app')

@section('content')

@include('include.header')

    <div class="flex h-container flex-col justify-evenly" >
        <div class="flex justify-center">
        <span class="max-w-md flex content-between flex-wrap">
            <h1 class="text-4xl font-bold">
                {{ __('Find the right course for you ') }}<br>
                {{ __('and go study abroad') }}
            </h1>
            <span class="text-2xl">
                <div class="mb-4">
                     {{ __('Do you want to explore the world and get a lifetime exprience?') }}
                </div>
                <div>
                    {{ __('Check the battles of your ancestors that can help you with your decisions.') }}
                </div>
            </span>
            <a href="/search" 
               role="button" 
               class="py-3 px-6 bg-red-600 hover:bg-red-800 rounded-full text-white">
               {{ __('Search for universities') }}
            </a>
        </span>
        <img class="max-w-lg ml-16 -mt-8" src="{{ asset('img/default.png') }}">
    </div>

    <ul class="flex justify-around mx-20">
        <li class="text-center">
            <div class="text-3xl font-bold mb-1">
                 {{ $countUni }}
            </div>
            <div class="text-lg">
                 {{ __('universities') }}
            </div>
        </li>
        <li class="text-center">
            <div class="text-3xl font-bold mb-1">
                 {{ $countMobility }}
            </div>
            <div class="text-lg">
                 {{ __('mobilities') }}
            </div>
        </li>
        <li class="text-center">
            <div class="text-3xl font-bold mb-1">
                 {{ $countCourse }}
            </div>
            <div class="text-lg">
                 {{ __('courses') }}
            </div>
        </li>
    </ul>
</div>
@endsection
