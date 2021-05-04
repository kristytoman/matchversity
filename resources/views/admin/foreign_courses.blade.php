@extends('layouts.app')

@section('title'){{ __('courses.foreignTitle') }} |@endsection

@section('content')

    @include('include.admin')

    <h2 class="text-xl text-black font-semibold
            mt-8 mb-4 pl-8">
        {{ __('courses.foreignTitle') }}
    </h2>
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <span class="flex place-items-center flex-col w-screen">
        @foreach ($universities as $university)
            <span class="ml-8 flex flex-col justify-evenly w-screen-3/5 bg-red-200 px-8 py-6 rounded-2xl my-8">
                <h2 class="text-2xl font-semibold text-red-900 uppercase tracking-wide
                           mb-6 mt-4 self-center">{{ $university->name }}</h2>
                <form method="POST"
                      action="{{ route('admin.foreign-courses.update', $university->id) }}">
                      @method('PUT')
                      @csrf
                    @foreach($university->foreignCourses as $course)
                        <input name="courses[{{ $university->id }}][{{ $course->id }}]" value="{{ $course->name }}"
                               class="my-2 p-1 w-full bg-red-100 border-red-200 text-red-900 border rounded">
                    @endforeach
                    <input type="submit" value="{{ __('courses.save') }}"
                           class="bg-red-500 text-white border rounded-md
                                  mt-6 px-4 py-2
                                  hover:bg-red-400 hover:border-red-500 hover:text-red-900 cursor-pointer">
                 </form>
            </span>
        @endforeach
        <span class="mb-8">
            {{ $universities->links() }}
        </span>
    </span>
@endsection