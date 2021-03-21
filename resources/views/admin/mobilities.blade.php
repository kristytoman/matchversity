@extends('layouts.app')

@include('include.admin')

@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.import') }}">
        @csrf
        <label>{{__('Mobilities')}}: </label>
        <input type="file" name="file" accept=".xlsx"/>
        <input type="submit" />
    </form>
    @foreach ($mobilities as $mobility)
        <div>
            <span>{{ $mobility->id }}</span>
            <span>{{ $mobility->arrival }}</span>
            <span>{{ $mobility->departure }}</span>
            <span>{{ $mobility->student }}</span>
            <span>{{ $mobility->university->original_name }}</span>
            <span>{{ $mobility->semester }}</span>
            <span>{{ $mobility->year }}</span>
            @foreach ($mobility->pairings as $pairing)
                <div>
                    <span>{{ $pairing->id }}</span>
                    <span>{{ $pairing->foreignCourse->name }}</span>
                    <span>{{ $pairing->homeCourse->code }}</span>
                    <span>{{ $pairing->reason_id }}</span>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection