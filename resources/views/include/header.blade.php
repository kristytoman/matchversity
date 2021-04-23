<nav class="hidden lg:flex lg:items-center sticky top-0 h-nav w-screen lg:w-auto lg:justify-between shadow-md mb-8 bg-white">
    <div class="hidden lg:flex lg:items-center">
        <a class="ml-8 mr-8 pb-1 text-xl lowercase font-bold"
           href="{{ url('/') }}">
           {{ config('app.name', 'Matchversity') }}
        </a>
        
        <ul class="lg:flex items-center justify-between text-base text-gray-400 pt-4 lg:pt-0">
            <li>
                <a class="lg:p-4 px-0 block border-b-2 border-transparent hover:text-indigo-500" 
                   href="https://www.utb.cz/univerzita/mezinarodni-vztahy/partneri-a-projekty/partneri/" 
                   target="_blank">
                   {{ __('Current contracts') }}
                </a>
            </li>
            <li>
                <a class="lg:p-4 px-0 block border-b-2 border-transparent hover:text-indigo-500" 
                   href="https://xchange.utb.cz/studijni-pobyty" 
                   target="_blank">
                   {{ __('Rated mobilities') }}
                </a>
            </li>
            <li>
                <a class="lg:p-4 px-0 block border-b-2 border-transparent hover:text-indigo-500" 
                    href="mobilities">
                    {{ __('My mobilities') }}
                </a>
            </li>
        </ul>
    </div>
    @auth
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
    @endauth
</nav>