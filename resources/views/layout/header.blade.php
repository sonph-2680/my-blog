<header class="navbar navbar-default justify-content-between bg-primary">
    <!-- Left Header Navigation -->
    <a href="{{route('home')}}" class="text-white font-weight-bold text-decoration-none">My Blog</a>
    <!-- END Left Header Navigation -->

    <!-- Right Header Navigation -->
    <ul class="nav navbar-nav-custom">
        <!-- User Dropdown -->
        <li class="dropdown">
            @if(Auth::check())
            <a href="javascript:void(0)" class="dropdown-toggle text-white" data-toggle="dropdown">
                {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li class="dropdown-header">Account</li>
                <li>
                    <a class="dropdown-item" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('posts.index') }}">
                        My posts
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('posts.create') }}">
                        Create post
                    </a>
                </li>
                <hr class="m-0"/>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        Logout
                    </a>
                </li>
            </ul>
            @else
                <a href="{{route('login.form')}}" class="text-white">Login</a>
            @endif
        </li>
        <!-- END User Dropdown -->
    </ul>
    <!-- END Right Header Navigation -->
</header>