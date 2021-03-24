@extends('layouts.app')

@include('include.admin')

@section('content')
<errors :errors="{{ $errors->all() }}"></errors>
<form method="POST" action="{{ route('admin.home-courses.update', $courses->first()) }}">
    @method('PUT')
    @csrf
    @foreach($courses as $course)
        <home-course :course="{{ $course }}"></home-course>
    @endforeach
    <input type="submit" value="Save">
</form>
@endsection