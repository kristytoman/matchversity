@extends('layouts.app')

@section('title'){{ $university->name }} |@endsection

@section('content')

    @include('include.header')

    <div class="flex justify-evenly h-full w-full flex-wrap-reverse">
        <div class="w-screen-full md:w-screen-3/5 md:max-w-screen-3/5 ">
            <div class="px-4 py-8">
                <div class="text-3xl font-semibold text-red-900 uppercase tracking-wide mb-4">
                    {{ $university->name }}
                </div>
                <div class="text-2xl text-red-800 mb-3">
                    {{ $university->native_name }}
                </div>
                <div class="text-xl text-red-800 mb-1">
                    {{ $university->city->name }}, {{ __('countries.' . $university->city->country_id) }}
                </div>
                <div class="flex self-start mt-6">
                    <a class="py-3 px-6 bg-red-600 
                              hover:bg-red-700 rounded-full text-white mr-8"
                       href="{{ $university->web }}" 
                       target="_blank">
                        {{ __('Check the website') }}
                    </a>
                    <a class="py-3 px-6 bg-red-600 
                              hover:bg-red-700 rounded-full text-white" 
                       href="{{ $university->xchangeLink }}"
                       target="_blank">
                        {{ __('University rating') }}
                    </a>
                </div>
            </div>
            @if ($courses['searched'] && ($courses['all']->currentPage() == 1))
                <h2 class="mt-8 text-2xl font-semibold ml-4">
                    {{ __('Courses for you') }}
                </h2>
                <div>
                    @foreach ($courses['searched'] as $course)
                        <pairing :data="{{ json_encode($course) }}"></pairing>
                    @endforeach
                </div>
            @endif
            <h2 class="mt-8 text-2xl font-semibold ml-4">
                {{ __('All courses') }}
            </h2>
            <div>
                @foreach ($courses['all'] as $course)
                    <pairing :data="{{ json_encode($course) }}"></pairing>
                @endforeach
            </div>
            <div class="mt-8">
            {{ $courses['all']->links() }}
            </div>
        </div>

        <div>
            <div class="flex-0 bg-red-100 px-8 py-6 mb-12 text-red-900 h-112 t-8 w-screen-3/4 md:w-screen-1/4 md:max-w-screen-1/4 rounded-2xl">
                <h2 class="text-xl my-4 font-bold">{{ __('Hint for you') }}</h2>
                <span>
                    <p class="my-4">{{ __('Universities share recent courses half a semester before mobilities.') }}</p>
                    <p class="my-4">{{ __('When they get posted, you will sign a learning agreement where you match their courses with yours.') }}</p>
                    <p class="my-4">{{ __('Here you can see the courses that other students used for their mobility.') }}</p>
                </span>
            </div>

            <div class="flex-0 bg-red-100 px-8 py-6 text-red-900 h-max-96 h-96 t-8 w-screen-3/4 md:w-screen-1/4 md:max-w-screen-1/4 rounded-2xl">
                <h2 class="text-xl my-4 font-bold">{{ __('Hint for you') }}</h2>
                <span>
                    <p class="my-4">{{ __('When you arrive abroad you will assemble your timetable.') }}</p>
                    <p class="my-4">{{ __('Some of your courses might not fit or there will be some other problem that won\'t allow you to attend the course.') }}</p>
                    <p class="my-4">{{ __('For this purpose, you can change your learning agreement one month after your arrival and add or remove some courses.') }}</p>
                </span>
            </div>
        </div>
        
    </div>
    @include('include.footer')
@endsection