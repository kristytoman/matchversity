<nav class="hidden lg:flex lg:items-center lg:w-auto lg:justify-between w-full">
    <div class="hidden lg:flex lg:items-center">
        <a class="ml-8 mr-8 pb-1 text-xl lowercase font-bold"
           href="{{ url('/') }}">
           {{ config('app.name', 'Matchversity') }}
        </a>
            
        <ul class="lg:flex items-center justify-between text-base text-gray-400 pt-4 lg:pt-0">
            <li>
                <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:text-indigo-500"
                   href="{{ route('admin.mobilities.index') }}">
                   {{ __('Mobilities') }}
                </a>
            </li>
            <li>
                <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:text-indigo-500"
                   href="{{ route('admin.universities.index') }}">
                   {{ __('Universities') }}
                </a>
            </li>
            <li>
                <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:text-indigo-500"
                   href="{{ route('admin.foreign-courses.index') }}">
                   {{ __('Foreign courses') }}
                </a>
            </li>
            <li>
                <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:text-indigo-500"
                   href="{{ route('admin.home-courses.index') }}">
                   {{ __('Home courses') }}
                </a>
            </li>
            <li>
                <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:text-indigo-500"
                   href="{{ route('admin.reasons.index') }}">
                   {{ __('Reasons') }}
                </a>
            </li>
        </ul>
    </div>
    <ul class="mr-8">
        @guest
            @if (Route::has('login'))
                <li>
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif
        @else
            <li>
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
            </li>
        @endguest
    </ul>
</nav>