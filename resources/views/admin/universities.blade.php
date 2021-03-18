@extends('layouts.app')

@section('content')
    <a href="#">{{ __('Rollback last transaction') }}</a>
    @foreach($universities as $university)
        <div>
            <span>{{ $university->id }}</span>
            <span>{{ $university->original_name }}</span>
            <span>{{ $university->name }}</span>
            <span>{{ $university->native_name }}</span>
            <span>{{ $university->city }}</span>
            @if($university->city)
                <span>{{ __('countries.' . $university->city->country_id) }}</span>
            @endif
            <span>{{ $university->xchange }}</span>
            <span>{{ $university->web }}</span>
            <a href="#">{{ __('Join with profile') }}</a>
        </div>
    @endforeach
@endsection