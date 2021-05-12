@extends('layouts.app')

@section('content')

@include('include.header')

    <div class="flex md:h-container mx-4 h-full flex-col justify-evenly" >
        <div class="flex justify-evenly flex-wrap-reverse md:flex-nowrap lf:flex-nowrap">
        <span class="md:max-w-md h-full max-w-screen flex content-between flex-wrap">
            <h1 class="pb-8 break-words text-4xl font-bold">
                {{ __('Find the right course for you ') }}
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
               class="py-3 px-6 mt-4 bg-red-600 hover:bg-red-800 rounded-full justify-self-center text-white tracking-wider">
               {{ __('Search for universities') }}
            </a>
        </span>
        <img class="max-w-screen md:max-w-md pb-8 md:ml-16 md:-mt-8" src="{{ asset('img/default.png') }}">
    </div>

    <ul class="flex justify-around mt-6 mx-20 space-x-4">
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
@include('include.footer')
@endsection
