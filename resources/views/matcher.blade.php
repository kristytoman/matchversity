@extends('layouts.app')

@section('content')
    <errors :errors="{{ $errors->all() }}"></errors>
    <form method="post" action="{{ route('universities.index') }}">
        @csrf
        <h3>{{ __('Winter') }}</h3>
        <h3>{{ __('Summer') }}</h3>
        <br>
        <label>{{ __('Faculty') }}</label>
        <select>
        </select>
        <label>{{ __('Study field') }}</label>
        <select>
        </select>
        <label>{{ __('Grade') }}</label>
        <input type="number" min="1" max="4">
        <span>{{ __('Or you can try to ')}}<a href="#">{{ __('log in') }}</a></span>
        <div>
       <input type="text" placeholder="Vyhledat zemi"><a href="#">{{__('Choose all of them')}}</a>
        @foreach ($geography->continents as $continent)
            <h3>{{ $continent->name }}</h3>
            <div>
            @foreach ($continent->regions as $region)
                <div>{{ $region->name }}</div>
                <select>
                    @foreach($region->countries as $country)
                        <option>{{ __('countries.' . $country->code )}}</option>
                    @endforeach
                </select>
            @endforeach
            </div>
        @endforeach
        </div>
        <input type="submit" value="{{ __('Search') }}"/>
    </form>
@endsection