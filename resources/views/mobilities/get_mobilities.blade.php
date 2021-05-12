@extends('layouts.app')

@section('title'){{ __('Your mobilities') }} |@endsection

@section('content')

    @include('include.header')

    <div class="flex justify-evenly h-container w-full flex-wrap-reverse">
        <div class="w-full md:w-screen-3/5 md:max-w-screen-3/5">
            <h2 class="my-8 font-semibold text-2xl">{{ __('Your mobilities') }}</h2>
            @if (($mobilities == null) || (count($mobilities) == 0))
                <div>{{ __('We haven\'t found any mobility.') }}</div>
            @else
                <div>
                    @foreach($mobilities as $mobility)
                        <my-mobility :mobility="{{ json_encode($mobility) }}" 
                                     :show-route="'{{ route('mobilities.edit', $mobility->id) }}'">
                        </my-mobility>
                    @endforeach
                </div>
            @endif
        </div>
        <div>
            <div class="flex-0 text-red-900 bg-red-200 
                        mt-8 px-8 py-6 h-46 w-screen-3/4 md:w-screen-1/4 md:max-w-screen-1/4 rounded-2xl">
                <h2 class="text-xl my-4 font-bold">{{ __('Hint for you!') }}</h2>
                <span>
                    <p class="my-4">
                        {{ __('You can share your experience on portal xchange.') }}
                    </p>
                    <p class="my-4">
                        {{  __('We are grateful for your comments and effort to help other students with their decisions.') }}
                    </p>
                </span>
            </div>
        </div>
    </div>
    @include('include.footer')
@endsection