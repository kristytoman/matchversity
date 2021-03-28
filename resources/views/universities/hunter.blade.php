@extends('layouts.app')

@include('include.header')

@section('content')
    <h2>{{ __('Search results') }}</h2>
    <div>
        <div>
            @foreach ($universities as $key => $uni)
                @if($uni['name'])
                    <university-result
                        :university="{{ json_encode($uni) }}" :route="'{{ route('universities.show', $key) }}'">
                    </university-result>
                @endif
            @endforeach
        </div>
    </div>

    <div>
        <span>{{ __('Tips for you!') }}</span>
        <span>{{ __('You have to get at least 18 ETCS on your study abroad.') }}</span>
        <span>{{ __('It\'s best to find as many courses as you would study at home university.') }}</span>
        <span>{{ __('It\'s best to find as many courses as you would study at home university.') }}</span>
    </div>
@endsection