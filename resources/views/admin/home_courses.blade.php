@extends('layouts.app')

@include('include.admin')

@section('content')
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('admin.home-courses.update', $courses->first()) }}">
    @method('PUT')
    @csrf
    @foreach($courses as $course)
        <home-course :course="{{ $course }}"></home-course>
    @endforeach
    <input type="submit" value="Save">
</form>
@endsection