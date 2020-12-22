<nav class="navbar navbar-expand-lg navbar-light navbar-dark" style="background-color: #fff;">

    <div class="container" style="color: black">
        <a class="navbar-brand" href="{{ url('/') }}"  style="color: black">
            Pet Track
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" style="color: black">
                <li><a class="nav-link" href="{{ url('/') }}" style="color: black">Board</a></li>
                @can('profileUser', App\User::class)
                    <li><a class="nav-link" href="{{ url('/user/profile') }}"  style="color: black" >Profile</a></li>
                @endcan
                @can('profileDoctor', App\User::class)
                    <li><a class="nav-link" href="{{ url('/docProfile') }}"  style="color: black">Profile</a></li>
                @endcan
                @can('createDoctor', App\User::class)
                    <li><a class="nav-link" href="{{ url('/admin/createDoc') }}"  style="color: black">All profile</a></li>
                @endcan
                @can('createTip' , App\User::class)
                    <li><a class="nav-link" href="{{ url('petTip') }}"  style="color: black">Create tip</a></li>
                @endcan

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style="color: black">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" style="color: black">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="color: black">
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
