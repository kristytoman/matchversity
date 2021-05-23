@extends('layouts.app')

@section('title'){{ __('reasons.title')}} |@endsection

@section('content')

    @include('include.admin')

    <errors :errors="{{ json_encode($errors->all()) }}"></errors>
    <div class="flex flex-col items-center">
        <form method="POST" action="{{ route('admin.reasons.store') }}"
              class="flex flex-col justify-evenly items-center w-screen-1/4
                     ml-8 mb-16 px-8 py-6 bg-red-300 rounded-2xl">
            @csrf
            <input name="description_cz"
                   placeholder="{{ __('reasons.descriptionCZ') }}"
                   class="flex flex-1 w-full
                          my-2 py-2 px-2 bg-red-100
                          border border-red-300 rounded">
            <input name="description_en"
                   placeholder="{{ __('reasons.descriptionEN') }}"
                   class="flex flex-1 w-full
                          my-2 py-2 px-2 bg-red-100
                          border border-red-300 rounded">
            <input type="submit" value="{{ __('reasons.create') }}"
                   class="bg-transparent text-red-700
                          cursor-pointer hover:text-red-900">
        </form>

        <span class="mb-8">
            <div class="flex bg-red-800 h-12 text-red-100 place-items-center">
                <span class="flex-none w-16">ID</span>
                <span class="flex-none w-64">{{ __('reasons.czech') }}</span>
                <span class="flex-none w-64">{{ __('reasons.english') }}</span>
                <span class="flex-none w-32"></span>
                <span class="flex-none w-32"></span>
                <span class="flex-none w-32"></span>
            </div>
            <div class="flex flex-col divide-y-4 divide-red-200">
                @foreach ($reasons as $reason)
                    @if (!$reason->is_verified)
                        <div class="flex bg-white py-2 min-h-12">
                            <form method="POST"
                                  action="{{ route('admin.reasons.update', $reason) }}"
                                  class="flex">
                                @method('PUT')
                                @csrf
                                <span name="id" class="flex-none w-16">{{ $reason->id }}</span>
                                <span class="flex-none w-64">
                                    <input name="description_cz" value="{{ $reason->description_cz }}"
                                           class="flex-none flex-0
                                                   mr-2 p-1 bg-red-100 border-red-200 text-red-900 w-60
                                                   border rounded">
                                </span>
                                <span class="flex-none w-64">
                                    <input name="description_en" value="{{ $reason->description_en }}"
                                           class="flex-none flex-0
                                                   mr-2 p-1 bg-red-100 border-red-200 text-red-900 w-60
                                                   border rounded">
                                </span>
                               <select name="connect"
                                       class="flex-none flex-0
                                              mr-2 p-1 bg-red-100 border-red-200 text-red-900 w-32
                                              border rounded">
                                    <option value="">Přiřadit</option>
                                    @foreach ($reasons as $reason2)
                                        @if(($reason2->id != $reason->id) && $reason2->is_verified)
                                            <option value="{{ $reason2->id }}">
                                                {{ $reason2->description_cz }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <input name="verify" type="submit" value="{{ __('reasons.save') }}"
                                       class="flex-none max-w-32
                                              mr-2 px-4 py-2 bg-red-500 text-white border rounded-md
                                              hover:bg-red-300 hover:border-red-500 hover:text-red-900">
                            </form>
                            <form method="POST"
                                  action="{{ route('admin.reasons.destroy', $reason) }}"
                                  class="flex-none max-w-32">
                                @method('DELETE')
                                @csrf
                                <input name="delete" type="submit" value="{{ __('reasons.delete') }}"
                                       class="bg-red-900 max-w-32 text-white
                                              px-4 py-2 border rounded-md
                                              hover:bg-red-300 hover:border-red-500 hover:text-red-900">
                            </form>
                        </div>
                    @else
                        <div class="flex bg-white py-2 min-h-12">
                            <span class="flex-none w-16">{{ $reason->id }}</span>
                            <span class="w-64">{{ $reason->description_cz }}</span>
                            <span class="w-64">{{ $reason->description_en }}</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </span>
    </div>
@endsection