@extends('layouts.app')

@include('include.admin')

@section('content')
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    @foreach ($universities as $university)
        <span>
            <h2>{{ $university->name }}</h2>
            <form method="POST" action="{{ route('admin.foreign-courses.update', $university->id) }}">
                @method('PUT')
                @csrf
                @foreach($university->foreignCourses as $course)
                    <input name="courses[{{ $university->id }}][{{ $course->id }}]" value="{{ $course->name }}">
                @endforeach
                <input type="submit" value="{{ __('homeCourses.save') }}">
            </form>
        </span>
    @endforeach
@endsection