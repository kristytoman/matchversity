@extends('layouts.app')

@include('include.admin')

@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>{{ __('Original name') }}</th>
            <th>{{ __('English name') }}</th>
            <th>{{ __('Native name') }}</th>
            <th>{{ __('Location') }}</th>
            <th>{{ __('xchange') }}</th>
            <th>{{ __('Website') }}</th>
            <th></th>
        </tr>
    @foreach($universities as $university)
    <tr>
            <td>{{ $university->id }}</td>
            <td>{{ $university->original_name }}</td>
            <td>{{ $university->name }}</td>
            <td>{{ $university->native_name }}</td>
            @if ($university->city)
            <td>{{ $university->city->name }}, {{ __('countries.'.$university->city->country_id) }}</td>
            @else
            <td><td>
            @endif
            <td>{{ $university->xchange }}</td>
            <td>{{ $university->web }}</td>
            <td><a href="{{ route('admin.universities.edit', $university) }}">{{ __('Edit profile') }}<a></td>
        </tr>
    @endforeach
    </table>
@endsection