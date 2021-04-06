@extends('layouts.app')

@include('include.header')

@section('content')
    <h2>{{ __('Search results') }}</h2>
    <div>
        <div>
            @foreach ($universities as $key => $uni)
                @if($uni['name'])
                    <university-result
                        :university="{{ json_encode($uni) }}" 
                        :route="'{{ route('universities.show', $key) }}'">
                    </university-result>
                @endif
            @endforeach
        </div>
    </div>

    <div>
        <span>{{ __('Hint for you!') }}</span>
    </div>
@endsection