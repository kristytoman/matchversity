@extends('layouts.app')

@section('title')Výjezdy |@endsection

@section('content')

@include('include.admin')

<div class="justify-center items-center w-screen">
    <form method="POST" 
          enctype="multipart/form-data" 
          action="{{ route('admin.mobilities.import') }}"
          class="ml-8 flex justify-evenly items-center  w-1/3 bg-red-300 px-8 py-6 rounded-2xl">
            @csrf
            <errors :errors="{{ json_encode($errors->all()) }}"></errors>
            <div class="overflow-hidden relative w-64 mt-4 mb-4">
                <span class="bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-red-700 hover:border-red-500 cursor-pointer font-semibold w-full inline-flex items-center">
                    <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                    </svg>
                    <span class="ml-2">{{ __('adminMobilities.new') }}</span>
                    <input class="cursor-pointer opacity-0 w-full h-full absolute block" type="file" name="file" accept=".xlsx"/>
                </span>
            </div>
            <input type="submit" 
                   value="{{ __('adminMobilities.import') }}"
                   class="text-white bg-transparent cursor-pointer"/>
    </form>

    <h2 class="pl-8 text-xl text-black mt-8 mb-4 font-semibold">Mobility</h2>

    <table class="w-screen max-w-screen">
        <thead class="justify-between w-screen max-w-screen">
        <tr class="bg-red-800 h-12 text-red-100">
            <th>ID</th>
            <th>{{ __('adminMobilities.arrival') }}</th>
            <th>{{ __('adminMobilities.departure') }}</th>
            <th>{{ __('adminMobilities.university') }}</th>
            <th>{{ __('adminMobilities.semester') }}</th>
            <th>{{ __('adminMobilities.year') }}</th>
        </tr>
    </thead>
    <tbody class="divide-y-4 divide-red-200 w-screen max-w-screen">
    @foreach ($mobilities as $mobility)
        <tr class="bg-white py-2 h-12">
            <td>{{ $mobility->id }}</td>
            <td>{{ $mobility->arrival }}</td>
            <td>{{ $mobility->departure }}</td>
            @if ($mobility->university->name)
                <td><a href="{{ route('admin.universities.edit', $mobility->university) }}"
                    class="text-red-700">
                    {{ $mobility->university->name }}
                </a></td>
            @else
                <td><a href="{{ route('admin.universities.edit', $mobility->university) }}"
                    class="bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-red-300 hover:border-red-500 hover:text-red-900 ">
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
    </tbody>
    </table>
    <div class="my-8">
    {{ $mobilities->links()}}
    </div>
</div>
@endsection