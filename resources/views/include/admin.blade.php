<nav >
    <div >
        <a  href="{{ url('/') }}">
            {{ config('app.name', 'Matchversity') }}
        </a>
        <button  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span ></span>
        </button>

        <div id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul >
                <li >
                    <a  href="{{ route('admin.mobilities.index') }}">{{ __('Mobilities') }}</a>
                </li>
                <li >
                    <a  href="{{ route('admin.universities.index') }}">{{ __('Universities') }}</a>
                </li>
                <li >
                    <a  href="{{ route('admin.foreign-courses.index') }}">{{ __('Foreign courses') }}</a>
                </li>
                <li >
                    <a  href="{{ route('admin.home-courses.index') }}">{{ __('Home courses') }}</a>
                </li>
                <li >
                    <a  href="{{ route('admin.reasons.index') }}">{{ __('Reasons') }}</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul >
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li >
                            <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <li >
                        <a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div  aria-labelledby="navbarDropdown">
                            <a  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>