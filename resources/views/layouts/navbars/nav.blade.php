<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.index')}}">ShopiLara</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item @if(Route::currentRouteName()=='home.index') active @endif">
                    <a class="nav-link" href="{{route('home.index')}}">Home
                        @if(Route::currentRouteName()=='home.index')<span class="sr-only">(current)1</span>@endif
                    </a>
                </li>
                <li class="nav-item @if(Route::currentRouteName()=='shopify_store.index') active @endif">
                    <a class="nav-link" href="{{ route('shopify_store.index') }}">View All Shops</a>
                    @if(Route::currentRouteName()=='shopify_store.index')<span class="sr-only">(current)2</span>@endif

                </li>
                <li class="nav-item @if(Route::currentRouteName()=='shopify_store.create') active @endif">
                    <a class="nav-link" href="{{ route('shopify_store.create') }}">Create a shop</a>
                    @if(Route::currentRouteName()=='shopify_store.create')<span class="sr-only">(current)3</span>@endif

                </li>
            </ul>
        </div>
    </div>
</nav>
