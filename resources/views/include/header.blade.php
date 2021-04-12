<nav class="hidden lg:flex lg:items-center pb-3 lg:w-auto lg:justify-between w-full">
    <div class="hidden lg:flex lg:items-center">
        <a class="ml-8 mr-8 pb-1 text-xl lowercase font-bold"
           href="{{ url('/') }}">
           {{ config('app.name', 'Matchversity') }}
        </a>
        
        <ul class="lg:flex items-center justify-between text-base text-gray-400 pt-4 lg:pt-0">
            <li>
                <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:text-indigo-500" 
                   href="https://www.utb.cz/univerzita/mezinarodni-vztahy/partneri-a-projekty/partneri/" 
                   target="_blank">
                   {{ __('Current contracts') }}
                </a>
            </li>
            <li>
                <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:text-indigo-500" 
                   href="https://xchange.utb.cz/studijni-pobyty" 
                   target="_blank">
                   {{ __('Rated mobilities') }}
                </a>
            </li>
            <li>
                <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:text-indigo-500" 
                    href="mobilities">
                    {{ __('My mobilities') }}
                </a>
            </li>
        </ul>
    </div>

    <ul class="mr-8">
        @guest
            @if (Route::has('login'))
                <li>
                    <a href="{{ route('login') }}">
                       {{ __('Login') }}
                    </a>
                </li>
            @endif
        @else
            <li>
                <div>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" 
                          action="{{ route('logout') }}"
                          method="POST">
                          @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>