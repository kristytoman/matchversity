@extends('layouts.app')

@include('include.admin')

@section('content')

<errors :errors="{{ json_encode($errors->all()) }}"></errors>

<form method="POST" action="{{ route('admin.reasons.store') }}">
    @csrf
        <label>{{ __('reasons.descriptionCZ') }}</label>
            <input name="description_cz" value="">
        <label>{{ __('reasons.descriptionEN') }}</label>
            <input name="description_en" value="">
        <input type="submit" value="{{ __('reasons.create') }}">
</form>

<span>
    <div>
        <span>ID</span>
        <span>{{ __('reasons.czech') }}</span>
        <span>{{ __('reasons.english') }}</span>
    </div>
    @foreach ($reasons as $reason)
        @if (!$reason->is_verified)
            <div>
                <form method="POST" action="{{ route('admin.reasons.update', $reason) }}">
                    @method('PUT')
                    @csrf
                    <span>{{ $reason->id }}</span>
                    <span><input name="description_cz" value="{{ $reason->description_cz }}"></span>
                    <span><input name="description_en" value="{{ $reason->description_en }}"></span>
                    <span><label>{{ __('reasons.connect') }}<label></span>
                    <span><select name="connect">
                        <option value=""></option>
                        @foreach ($reasons as $reason2)
                            @if(($reason2->id != $reason->id) && $reason2->is_verified)
                                <option value="{{ $reason2->id }}">{{ $reason2->description_cz }}</option>
                            @endif
                        @endforeach
                    </select></span>
                    <span><input type="submit" value="{{ __('reasons.save') }}"></span>
                </form>              
                <span><form method="POST" action="{{ route('admin.reasons.destroy', $reason) }}">
                    @method('DELETE')
                    @csrf
                <input type="submit" value="{{ __('reasons.delete') }}"></form></span>
            </div>
        @else
            <div>
                <span>{{ $reason->id }}</span>
                <span>{{ $reason->description_cz }}</span>
                <span>{{ $reason->description_en }}</span>
            </div>
        @endif
    @endforeach
</span>
@endsection