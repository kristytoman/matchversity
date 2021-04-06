@extends('layouts.app')

@include('include.admin')

@section('content')
<errors :errors="{{ json_encode($errors->all()) }}"></errors>
<div><span></span></div>
<form method="POST" action="{{ route('admin.home-courses.update', $courses->first()) }}">
    @method('PUT')
    @csrf
    @foreach($courses as $course)
        <home-course :course="{{ $course }}"></home-course>
    @endforeach
    <input type="submit" value="{{ __('homeCourses.save') }}">
</form>
@endsection