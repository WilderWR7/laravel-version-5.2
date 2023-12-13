<nav>
    <ul class="list">
        <li class={{setActive('home')}}>
            <a href="{{route('home')}}"> 
                {{__('Home')}}
            </a>
        </li>
        <li class={{request()->routeIs('about')?'actived':''}} >
            <a href="{{route('about')}}">
                @lang('About')
            </a>
        </li>
        <li class={{setActive('portafolio')}} >
            <a href="{{route('project.index')}}"> 
                {{__('Portafolio')}}
            </a>
        </li>
        <li class={{setActive('contacto')}} >
            <a href="{{route('contacto')}}"> 
                {{__('Contact')}}
            </a>
        </li>
        @guest
            <li class={{setActive('login')}} >
                <a href="{{route('login')}}"> 
                    {{__('Login')}}
                </a>
            </li>
        @else
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </li>
        @endguest 
    </ul>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
