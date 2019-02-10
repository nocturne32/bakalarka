<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('app_homepage') }}">Laravel demo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-nav"
                aria-controls="mobile-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mobile-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ active('app_homepage') }}">
                    <a href="{{ route('app_homepage') }}" class="nav-link">Articles</a></li>
                @guest
                    <li class="nav-item {{ active('login') }}">
                        <a href="{{ route('login') }}" class="nav-link">Sign in</a></li>
                    <li class="nav-item {{ active('register') }}">
                        <a href="{{ route('register') }}" class="nav-link">Sign up</a></li>
                @else
                    <li class="nav-item {{ active('app_article_add') }}">
                        <a href="{{ route('app_article_add') }}" class="nav-link">New article</a></li>
                    <li class="nav-item {{ active('app_article_list') }}">
                        <a href="{{ route('app_article_list') }}" class="nav-link">Edit articles</a></li>
                    <li class="nav-item {{ active('app_category_list') }}">
                        <a href="{{ route('app_category_list') }}" class="nav-link">Edit categories</a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <li class="nav-item {{ active('logout') }}">
                        <a href="{{ route('logout') }}" class="nav-link"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                @endguest
            </ul>
            <!--<form class="form-inline my-2 my-lg-0">-->
            <!--<input class="form-control mr-sm-2" type="text" placeholder="Search">-->
            <!--<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>-->
            <!--</form>-->
        </div>
    </div>
</nav>
