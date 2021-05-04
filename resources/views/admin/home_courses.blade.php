@extends('layouts.app')

@section('title'){{ __('courses.homeTitle') }} |@endsection

@section('content')

@include('include.admin')

    <div class="flex flex-col w-screen">
        <h2 class="pl-8 text-xl text-black font-semibold">{{ __('courses.homeTitle') }}</h2>
        <errors :errors="{{ json_encode($errors->all()) }}"></errors>
        <form method="POST"
              action="{{ route('admin.home-courses.update', $courses->first()) }}" class="max-w-screen w-screen">
              @method('PUT')
              @csrf
            @foreach($courses as $course)
                <home-course :course="{{ $course }}"></home-course>
            @endforeach
            <input type="submit" value="{{ __('courses.save') }}"
                   class="bg-red-500 text-white
                          ml-8 mt-6 px-4 py-2 border rounded-md
                          hover:bg-red-400 hover:border-red-500 hover:text-red-900 cursor-pointer">
        </form>

        <div class="w-64 flex self-center justify-evenly mb-8">
            @if($courses->previousPageUrl())
                <a href="{{ $courses->previousPageUrl() }}"
                   class="bg-red-100 text-red-800
                          mt-6 px-4 py-2 border rounded-md
                          hover:bg-red-200 hover:border-red-300 hover:text-red-900 cursor-pointer">
                    {{ __('courses.prev') }}</a>
            @endif
            @if($courses->nextPageUrl())
                <a href="{{$courses->nextPageUrl()}}"
                    class="bg-red-100 text-red-800
                           mt-6 px-4 py-2 border rounded-md
                           hover:bg-red-200 hover:border-red-300 hover:text-red-900 cursor-pointer">
                    {{ __('courses.next') }}</a>
            @endif
        </div>
    </div>
@endsection