@extends('layouts.app')

@include('include.admin')

@section('content')

<errors :errors="{{ $errors->all() }}"></errors>

<form method="POST" action="{{ route('admin.reasons.store') }}">
    @csrf
<table>
    <div>
        <span>{{ __('Czech description') }}</span>
        <span>{{ __('English description') }}</span>
        <span>{{ __('Submit') }}</span>
    </div>
    <div>
        <span><input name="description_cz" value=""></span>
        <span><input name="description_en" value=""></span>
        <span><input type="submit" value="{{ __('Create new reason') }}"></span>
    </div>
</table>
</form>
<span>
    <div>
        <span>ID</span>
        <span>{{ __('Czech') }}</span>
        <span>{{ __('English') }}</span>
        <span>{{ __('Connect')}}</span>
        <span>{{ __('Save') }}</span>
        <span>{{ __('Delete') }}</span>
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
                    <span><select name="connect">
                        <option value=""></option>
                        @foreach ($reasons as $reason2)
                            @if(($reason2->id != $reason->id) && $reason2->is_verified)
                                <option value="{{ $reason2->id }}">{{ $reason2->description_cz }}</option>
                            @endif
                        @endforeach
                    </select></span>
                    <span><input type="submit" value="{{ __('Verify and save') }}"></span>
                </form>
                
                    <span><form method="POST" action="{{ route('admin.reasons.destroy', $reason) }}">
                        @method('DELETE')
                        @csrf
                    <input type="submit" value="{{ __('Delete') }}"></form></span>
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