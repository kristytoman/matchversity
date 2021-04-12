@extends('layouts.app')
@section('content')
    <h2>{{ __('Login') }}</h2>
    <form method="POST"
          action="login">
          @csrf
          <div>
                <label for="email">
                       {{ __('E-Mail Address') }}
                </label>
                <div>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           autocomplete="email"
                           required>
                    @error('email')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
          </div>
          <div>
                <label for="password">
                       {{ __('Password') }}
                </label>
                <div>
                    <input id="password"
                           type="password"
                           name="password"
                           autocomplete="current-password"
                           required>
                    @error('password')
                        <span >
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
          </div>
          <div>
                <input id="remember"
                       type="checkbox"
                       name="remember"
                       {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                       {{ __('Remember Me') }}
                </label>
            </div>
            <button type="submit">
                {{ __('Login') }}
            </button>
    </form>
@endsection
