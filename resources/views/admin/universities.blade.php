@extends('layouts.app')

@include('include.admin')

@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>{{ __('adminUniversities.originalName') }}</th>
            <th>{{ __('adminUniversities.englishName') }}</th>
            <th>{{ __('adminUniversities.nativeName') }}</th>
            <th>{{ __('adminUniversities.location') }}</th>
            <th>{{ __('adminUniversities.xchangeID') }}</th>
            <th>{{ __('adminUniversities.xchangeLink') }}</th>
            <th>{{ __('adminUniversities.website') }}</th>
            <th></th>
        </tr>
    @foreach($universities as $university)
        <tr>
            <td>{{ $university->id }}</td>
            <td>{{ $university->original_name }}</td>
            <td>{{ $university->name }}</td>
            <td>{{ $university->native_name }}</td>
            @if ($university->city)
                <td>{{ $university->city->name }}, 
                    {{ __('countries.'.$university->city->country_id) }}
                </td>
            @else
                <td><td>
            @endif
            <td>{{ $university->xchange_id }}</td>
            <td>{{ $university->xchange_link }}</td>
            <td>{{ $university->web }}</td>
            <td><a href="{{ route('admin.universities.edit', $university) }}">
                {{ __('adminUniversities.edit') }}
            </a></td>
        </tr>
    @endforeach
    </table>
@endsection