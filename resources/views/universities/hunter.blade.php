@extends('layouts.app')

@section('title')Výsledky vyhledávání |@endsection

@section('content')

@include('include.header')
    <div class="flex w-full">
    <div class="flex-col mx-16 w-screen-3/5 max-w-screen-3/5">
        @if($top3)
            <div class="mb-8">
                <h3 class="mb-4 font-semibold text-2xl">Nejnavštěvovanější univerzity</h3>
                <div class="flex justify-evenly">
                    @foreach ($top3 as $key => $uni)
                        <a class="flex flex-col h-72 justify-end flex-none mx-2 min-h-full w-1/3 self-center bg-red-600  hover:bg-red-800 px-8 py-6 my-4 rounded-2xl"
                            href="{{ route('universities.show', $uni->id) }}">
                            <span class="text-2xl text-white overflow-ellipsis overflow-hidden font-semibold uppercase tracking-wide mb-2">{{ $uni->name }}</span>
                            <span class="text-lg text-red-100 mb-1 overflow-ellipsis overflow-hidden">{{ $uni->native_name }}</span>
                            <span class="text-red-100">{{ $uni->city->name }}, {{ __('countries.' . $uni->city->country_id) }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
        <div>
            
        <h2 class="mb-8 font-semibold text-2xl">{{ __('Search results') }}</h2>
            @foreach ($universities as $key => $uni)
                @if($uni->name)
                    <university-result :university="{{ json_encode($uni) }}" 
                                       :route="'{{ route('universities.show', $uni->id) }}'">
                    </university-result>
                @endif
            @endforeach
        </div>
    </div>

    <div class="flex-0 bg-red-200 text-red-900 px-8 py-6 mt-16 h-full w-screen-1/4 max-w-screen-1/4 rounded-2xl">
        <h2 class="text-xl my-4 font-bold">{{ __('Hint for you') }}</h2>
        <span>
            <p class="my-4">Na výjezdu musíš splnit alespoň 18 kreditů.</p>
            <p class="my-4">Zároveň je nejlepší, pokud se ti podaří spárovat počet předmětů, který máš během semestru absolvovat na naší univerzitě.</p>
            <p class="my-4">Předejdeš tak komplikacím a možnému prodlužování studia.</p>
        </span>
    </div>
</div>
@endsection