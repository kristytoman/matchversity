@extends('layouts.app')

@include('include.admin')

@section('content')
    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.mobilities.import') }}">
        @csrf
        <label>{{ __('adminMobilities.new') }}: </label>
        <input type="file" name="file" accept=".xlsx"/>
        <input type="submit" value="{{ __('adminMobilities.import') }}" />
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>{{ __('adminMobilities.arrival') }}</th>
            <th>{{ __('adminMobilities.departure') }}</th>
            <th>{{ __('adminMobilities.student') }}</th>
            <th>{{ __('adminMobilities.university') }}</th>
            <th>{{ __('adminMobilities.semester') }}</th>
            <th>{{ __('adminMobilities.year') }}</th>
        </tr>
    @foreach ($mobilities as $mobility)
        <tr>
            <td>{{ $mobility->id }}</td>
            <td>{{ $mobility->arrival }}</td>
            <td>{{ $mobility->departure }}</td>
            <td>{{ $mobility->user->utbID }}</td>
            @if ($mobility->university->name)
                <td><a href="{{ route('admin.universities.edit', $mobility->university) }}">
                    {{ $mobility->university->name }}
                </a></td>
            @else
                <td><a href="{{ route('admin.universities.edit', $mobility->university) }}">
                    {{ __('adminMobilities.create') }}
                </a></td>
            @endif
            @if ($mobility->is_summer)
                <td>{{ __('adminMobilities.summer') }}</td>
            @else
                <td>{{ __('adminMobilities.winter') }}</td>
            @endif
            <td>{{ $mobility->year }}</td>
        </tr>
    @endforeach
    </table>
@endsection