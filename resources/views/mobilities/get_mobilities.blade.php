@extends('layouts.app')


@section('content')
@include('include.header')
    <div class="flex justify-evenly h-container w-full">
        <div class="w-screen-3/5 max-w-screen-3/5">
        <h2 class="my-8 font-semibold text-2xl">Tvoje mobility</h2>
    @if (($mobilities == null) || (count($mobilities) == 0))
        <div>{{ __('We haven\'t found any mobility.') }}</div>
    @else
        <div>
        @foreach($mobilities as $mobility)
            <my-mobility :mobility="{{ $mobility }}" 
                         :show-route="'{{ route('mobilities.edit', $mobility->id) }}'">
            </my-mobility>
        @endforeach
        </div>
    @endif
    </div>
    <div>
        <div class="flex-0 bg-gray-200 px-8 py-6 h-90 mt-8 w-screen-1/4 max-w-screen-1/4 rounded-2xl">
            <h2 class="text-xl my-4 font-bold">{{ __('Hint for you!') }}</h2>
            <span>
                <p class="my-4">Na výjezdu musíš splnit alespoň 18 kreditů.</p>
                <p class="my-4">Zároveň je nejlepší, pokud se ti podaří spárovat počet předmětů, který máš během semestru absolvovat na naší univerzitě.</p>
                <p class="my-4">Předejdeš tak komplikacím a možnému prodlužování studia.</p>
            </span>
        </div>
    </div>
        </div>
@endsection