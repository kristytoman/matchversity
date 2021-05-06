<div class="flex flex-col mb-8">
    <nav class="flex items-center sticky top-0 h-nav w-full min-w-screen justify-between shadow-md bg-white">
        <div class="hidden lg:flex lg:items-center">
            <a class="ml-8 mr-8 pb-1 m-h-8 h-8"
               href="{{ url('/') }}">
               <img class="m-h-8 h-8" src="{{ asset('img/logo.png') }}">
            </a>
            <ul class="lg:flex items-center justify-between text-base text-gray-400 pt-4 lg:pt-0">
                <li>
                    <a class="lg:p-4 px-0 block border-b-2 border-transparent hover:text-red-500" 
                       href="https://www.utb.cz/univerzita/mezinarodni-vztahy/partneri-a-projekty/partneri/" 
                       target="_blank">
                       {{ __('Current contracts') }}
                    </a>
                </li>
                <li>
                    <a class="lg:p-4 px-0 block border-b-2 border-transparent hover:text-red-500" 
                       href="https://xchange.utb.cz/studijni-pobyty" 
                       target="_blank">
                       {{ __('Rated mobilities') }}
                    </a>
                </li>
                <li>
                    <a class="lg:p-4 px-0 block border-b-2 border-transparent hover:text-red-500" 
                        href="{{ route('mobilities.index') }}">
                        {{ __('My mobilities') }}
                    </a>
                </li>
            </ul>
        </div>
        @auth
            <div class="hidden lg:flex mr-8">
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
        <div class="flex ml-4 items-center space-x-2 lg:hidden">
            <button class="p-1 rounded-md hover:bg-red-100 focus:bg-red-100 focus:outline-none"
                    onclick="if (document.getElementById('nav').classList.contains('hidden')) {
                                 document.getElementById('nav').classList.remove('hidden') 
                             } 
                             else {
                                 document.getElementById('nav').classList.add('hidden')
                             }">
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 text-red-700">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0
                            110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </button>
        </div>
        <a class="lg:hidden ml-8 mr-8 pb-1 m-h-8 h-8"
           href="{{ url('/') }}">
            <img class="m-h-8 h-8" src="{{ asset('img/logo.png') }}">
        </a>
    </nav>
    <div id="nav" 
         class="absolute hidden top-16 pb-4 flex flex-col pt-4 bg-white space-y-4 px-8 w-1/2 shadow-md">
        <div class="flex flex-col space-y-4">
            <a class="text-gray-400 hover:text-red-500" 
               href="https://www.utb.cz/univerzita/mezinarodni-vztahy/partneri-a-projekty/partneri/" 
               target="_blank">
               {{ __('Current contracts') }}
            </a> 
            <a class="text-gray-400 hover:text-red-500" 
               href="https://xchange.utb.cz/studijni-pobyty" 
               target="_blank">
               {{ __('Rated mobilities') }}
            </a>
            <a class="text-gray-400 hover:text-red-500" 
               href="{{ route('mobilities.index') }}">
              {{ __('My mobilities') }}
            </a>
        </div>
        <div class="flex flex-col space-y-4 lg:space-y-0 lg:flex-row lg:items-center lg:space-x-4">
            @auth
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"
                    class="flex items-center justify-center h-12 px-4 mt-2 text-sm text-center 
                            text-gray-600 border rounded-lg 
                            hover:bg-gray-100 focus:outline-none">
                    {{ __('Logout') }}
                </a>
            @endauth
        </div>
    </div>
</div>