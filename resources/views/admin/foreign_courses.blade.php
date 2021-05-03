@extends('layouts.app')


@section('content')
@include('include.admin')
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <span class="flex place-items-center flex-col w-screen">
    @foreach ($universities as $university)
        <span class="ml-8 flex flex-col justify-evenly w-screen-3/5 bg-red-200 px-8 py-6 rounded-2xl my-8">
            <h2 class="text-2xl font-semibold text-red-900 uppercase tracking-wide mb-6 self-center mt-4">{{ $university->name }}</h2>
            <form method="POST" action="{{ route('admin.foreign-courses.update', $university->id) }}">
                @method('PUT')
                @csrf
                @foreach($university->foreignCourses as $course)
                    <input name="courses[{{ $university->id }}][{{ $course->id }}]" value="{{ $course->name }}"
                    class="my-2 p-1 w-full bg-red-100 border-red-200 text-red-900 border rounded">
                @endforeach
                <input type="submit" value="{{ __('homeCourses.save') }}"
                class="bg-red-500 text-white mt-6 px-4 py-2 border rounded-md hover:bg-red-400 hover:border-red-500 hover:text-red-900 cursor-pointer">
            </form>
        </span>
    @endforeach
    </span>
@endsection