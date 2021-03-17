@extends('layouts.app')

@section('content')
    <h2>{{ __('Search results') }}</h2>
    
    @if(count($top3) == 3)
        <h3>{{__('Most favorite destinations') }}</h3>
        <div>
            @foreach ($top3 as $uni)
            <a href={{ route('universities.show', $uni->id)}}>
                <span>{{ $uni->name }}</span>
                <span>&starf;&starf;&starf;&starf;&starf;</span>
            </a>
            @endforeach
        </div>
    @endif

    <div>
        <div>
            @foreach ($universities as $uni)
            @if($uni->name)
            <div>
                <a href={{ route('universities.show', $uni->id)}}>
                        <span>{{ $uni->name }}</span>
                        <span>&starf;&starf;&starf;&starf;&starf;</span>
                        <div>{{ $uni->native_name }}</div>
                        @if($uni->city)
                            <div>{{ $uni->city->name }}, {{ __('countries.' . $uni->city->country_id) }}</div>
                        @endif
                        <div>
                            @foreach ($uni->foreignCourses as $i => $course)
                                @if ($i < 5)
                                <span>{{ $course->name }}</span>
                                @else   
                                    @break
                                @endif
                            @endforeach
                        </div>
                    </div>
                </a>
                <br>
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