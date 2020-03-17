{{--<nav class="navbar navbar-expand-lg navbar-light" >--}}
{{--    <a class="navbar-brand">PET TRACK</a>--}}
{{--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--        <span class="navbar-toggler-icon"></span>--}}
{{--    </button>--}}

{{--    <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--        <ul class="navbar-nav mr-auto">--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="">HOME<span class="sr-only">(current)</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="">PROFILE</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="">DOCTOR</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</nav>--}}
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Pet Track
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li><a class="nav-link" href="{{ url('/') }}">Board</a></li>
                @can('profileUser', App\User::class)
                    <li><a class="nav-link" href="{{ url('/user/profile') }}">Profile</a></li>
                @endcan
                @can('profileDoctor', App\User::class)
                    <li><a class="nav-link" href="{{ url('/docProfile') }}">Profile</a></li>
                @endcan
                @can('createDoctor', App\User::class)
                    <li><a class="nav-link" href="{{ url('/admin/createDoc') }}">all doctor</a></li>
                @endcan
                @can('viewAny', App\User::class)
                    <li><a class="nav-link" href="{{ url('/admin/viewMembers') }}">all user</a></li>
                @endcan
                @can('createTip' , App\User::class)
                    <li><a class="nav-link" href="{{ url('petTip') }}">create tip</a></li>
                @endcan

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
