<nav>
    <div class="flex items-center">
        <a  href="{{ url('/') }}">
            {{ config('app.name', 'Matchversity') }}
        </a>

        <div  id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul>
                <li>
                    <a href="https://www.utb.cz/univerzita/mezinarodni-vztahy/partneri-a-projekty/partneri/" 
                       target="_blank">{{ __('Current contracts') }}
                    </a>
                </li>
                <li>
                    <a  href="https://xchange.utb.cz/studijni-pobyty" 
                        target="_blank">{{ __('Rated mobilities') }}
                    </a>
                </li>
                <li>
                    <a  href="mobilities">{{ __('My mobilities') }}</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <div>
                            <a  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>