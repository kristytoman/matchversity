@extends('layouts.app')

@section('content')
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