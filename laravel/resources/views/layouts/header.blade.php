<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('app_homepage') }}">PHP Framework Demo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-nav"
                aria-controls="mobile-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mobile-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('app_homepage') }}" class="nav-link">Articles</a></li>
                <li class="nav-item"><a href="{{ route('app_article_add') }}" class="nav-link">New article</a></li>
                <li class="nav-item"><a href="{{ route('app_article_list') }}" class="nav-link">Edit articles</a></li>
                <li class="nav-item"><a href="{{ route('app_category_list') }}" class="nav-link">Edit categories</a></li>
                <li class="nav-item"><a href="{{ route('app_sign_in') }}" class="nav-link">Sign in</a></li>
                <li class="nav-item"><a href="{{ route('app_sign_up') }}" class="nav-link">Sign up</a></li>
                <li class="nav-item"><a href="{{ route('app_sign_out') }}" class="nav-link">Sign out</a></li>
            </ul>
            <!--<form class="form-inline my-2 my-lg-0">-->
            <!--<input class="form-control mr-sm-2" type="text" placeholder="Search">-->
            <!--<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>-->
            <!--</form>-->
            @if (Route::has('app_sign_in'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/') }}">Home</a>
                    @else
                        <a href="{{ route('app_sign_in') }}">Login</a>
                        <a href="{{ route('app_sign_up') }}">Register</a>
                    @endauth
                </div>
            @endif
        <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app_sign_in') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('app_sign_up') }}">{{ __('Register') }}</a>
                    @endif
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('app_sign_out') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('app_sign_out') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </div>
    </div>
</nav>
