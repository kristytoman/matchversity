@extends('layouts.app')

@section('title')Univerzity |@endsection

@section('content')

@include('include.admin')

<h2 class="pl-8 text-xl text-black mt-8 mb-4 font-semibold">Univerzity</h2>
    <table class="w-full table-auto">
        <thead class="justify-between">
        <tr class="bg-red-800 h-12 border-4 border-red-800 text-red-100">
            <th>ID</th>
            <th>{{ __('adminUniversities.originalName') }}</th>
            <th>{{ __('adminUniversities.englishName') }}</th>
            <th>{{ __('adminUniversities.nativeName') }}</th>
            <th>{{ __('adminUniversities.location') }}</th>
            <th>{{ __('adminUniversities.xchangeID') }}</th>
            <th>{{ __('adminUniversities.xchangeLink') }}</th>
            <th>{{ __('adminUniversities.website') }}</th>
        </tr>
        </thead>
        <tbody>
    @foreach($universities as $university)
    <tr class="cursor-pointer bg-white border-4 hover:bg-red-100 border-red-200 px-16 py-2 h-12" onclick="window.location='{{ route('admin.universities.edit', $university) }}'">
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
        </tr>
    @endforeach
    </tbody>
    </table>

    @endsection