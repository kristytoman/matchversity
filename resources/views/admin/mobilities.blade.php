@extends('layouts.app')

@include('include.admin')

@section('content')
    <errors :errors="{{ $errors->all() }}"></errors>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.mobilities.import') }}">
        @csrf
        <label>{{__('Mobilities')}}: </label>
        <input type="file" name="file" accept=".xlsx"/>
        <input type="submit" />
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>{{ __('Arrival') }}</th>
            <th>{{ __('Departure') }}</th>
            <th>{{ __('Student') }}</th>
            <th>{{ __('University') }}</th>
            <th>{{ __('Semester') }}</th>
            <th>{{ __('Year') }}</th>
        </tr>
    @foreach ($mobilities as $mobility)
        <tr>
            <td>{{ $mobility->id }}</td>
            <td>{{ $mobility->arrival }}</td>
            <td>{{ $mobility->departure }}</td>
            <td>{{ $mobility->user->utbID }}</td>
            @if ($mobility->university->name)
            <td><a href="{{ route('admin.universities.edit', $mobility->university) }}">{{ $mobility->university->name }}<a></td>
            @else
                <td><a href="{{ route('admin.universities.edit', $mobility->university) }}">{{ __('Create profile') }}<a></td>
            @endif
            @if ($mobility->is_summer)
                <td>{{ __('Summer') }}</td>
            @else
                <td>{{ __('Winter') }}</td>
            @endif
            <td>{{ $mobility->year }}</td>
        </tr>
    @endforeach
    </table>
@endsection