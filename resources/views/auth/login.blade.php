@extends('layouts.app')
@section('content')
@include('include.header')
<div class="w-screen h-container flex justify-center place-items-center">
<div class="flex flex-col justify-center self-center bg-indigo-800 px-8 py-6 rounded-2xl">

    <h2 class="text-xl text-white font-semibold">Přihlašování</h2>
    <form method="POST"
          action="login">
          @csrf
          <div>
                <div>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           autocomplete="email"
                           placeholder="{{ __('E-Mail Address') }}"
                           class="my-6 flex-1 bg-indigo-200 flex border w-full border-indigo-400 rounded"
                           required>
                    @error('email')
                        <span>
                            <strong class="text-indigo-100">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
          </div>
          <div>
                <div>
                    <input id="password"
                           type="password"
                           name="password"
                           autocomplete="current-password"
                           placeholder="{{ __('Password') }}"
                           class="my-6 flex-1 bg-indigo-200 flex border w-full border-indigo-400 rounded"
                           required>
                    @error('password')
                        <strong class="text-indigo-100">{{ $message }}</strong>
                    @enderror
                </div>
          </div>
          <div class="flex justify-between text-indigo-100">
            <label for="remember" class="mr-8">
                <input id="remember"
                       type="checkbox"
                       name="remember"
                       class="h-5 w-5 text-indigo-300 rounded-md"
                       {{ old('remember') ? 'checked' : '' }}>
                       {{ __('Remember Me') }}
                </label>
            
            <button type="submit">
                {{ __('Login') }}
            </button>
        </div>
    </form>
</div>
</div>
@endsection
