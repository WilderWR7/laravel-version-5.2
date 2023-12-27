<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm bg-light">
    <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                {{ config('app.name') }}
            </a>
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
                <ul class="nav-pills navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ setActive('home') }}" href="{{route('home')}}">
                            {{__('Home')}}
                        </a>
                    </li>
                    <li class="nav-item"  >
                        <a class="nav-link {{request()->routeIs('about')?'active':''}}" href="{{route('about')}}">
                            @lang('About')
                        </a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link {{ setActive('project.*') }}" href="{{route('project.index')}}">
                            {{__('Portafolio')}}
                        </a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link {{ setActive('contacto') }}" href="{{route('contacto')}}">
                            {{__('Contact')}}
                        </a>
                    </li>
                    @guest
                        <li class="nav-item" >
                            <a class="nav-link {{ setActive('login') }}" href="{{route('login')}}">
                                {{__('Login')}}
                            </a>
                        </li>
                    @else
                        <li>
                            <a class="dropdown-item nav-link" href="nav-item"

                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    @endguest
                </ul>
                @auth()
                    {{ auth()->user()->name }}

                @endauth

            {{-- </div> --}}
    </div>
</nav>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
