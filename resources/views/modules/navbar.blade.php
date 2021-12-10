<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <!-- Begin Logo -->
        <a class="navbar-brand" href={{route('allArticles')}}>
            <img src="https://cdn-icons-png.flaticon.com/128/3959/3959420.png"  alt="logo">
        </a>
        <!-- End Logo -->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <!-- Begin Menu -->
            <ul class="navbar-nav ml-auto">
                @if(Auth::user()->is_author)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('article.index')}}">Your stories <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('article.create')}}">Create new Post</a>
                    </li>
                @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('allSubscribes')}}">Subscribes <span class="sr-only"></span></a>
                    </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('allArticles')}}">All stories <span class="sr-only"></span></a>
                </li>

                <li>
                    <a style="color: #a94442; font-size: 14px" class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>




            <!-- End Menu -->
            <!-- Begin Search -->
            <form class="form-inline my-2 my-lg-0"  method="get" enctype="multipart/form-data" action="{{route('search')}}">
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
                <span class="search-icon"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path></svg></span>
            </form>
            <!-- End Search -->
        </div>
    </div>
</nav>
