@extends('layouts.app')

@section('content')
<div >
    <div >
        <div >
            <div >
                <div >{{ __('Login') }}</div>

                <div >
                    <form method="POST" action="login">
                        @csrf

                        <div >
                            <label for="email" >{{ __('E-Mail Address') }}</label>

                            <div >
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div >
                            <label for="password" >{{ __('Password') }}</label>

                            <div >
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div >
                            <div >
                                <div >
                                    <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label  for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div >
                            <button type="submit" >
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
