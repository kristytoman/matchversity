@extends('layouts.app')

@section('content')
    @foreach ($reasons as $reason)
        <div>
            <span>{{ $reason->id }}</span>
            <span>{{ $reason->description }}</span>
            <a href="#">{{ __('Edit')}}</a>
            <a href="#">{{ __('Verify')}}</a>
        </div>
    @endforeach
@endsection