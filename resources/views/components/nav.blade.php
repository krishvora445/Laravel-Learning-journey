<div class="navbar rounded-box border border-base-300 bg-base-100/90 shadow-sm backdrop-blur">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu dropdown-content menu-sm z-10 mt-3 w-56 rounded-box bg-base-100 p-2 shadow">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                @auth
                    <li><a href="{{ url('/ideas') }}">Ideas</a></li>
                @else
                    <li><a href="{{ route('login') }}">Ideas</a></li>
                @endauth
                @can('view-admin')
                    <li><a href="{{ url('/admin') }}">Admin</a></li>
                @endcan
            </ul>
        </div>

        <a href="{{ url('/') }}" class="btn btn-ghost text-lg font-semibold normal-case tracking-wide">
            <span class="badge badge-primary badge-sm mr-2">Idea</span>
            The Idea Company
        </a>
    </div>

    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            @auth
                <li><a href="{{ url('/ideas') }}">Ideas</a></li>
            @else
                <li><a href="{{ route('login') }}">Ideas</a></li>
            @endauth
            @can('view-admin')
                <li><a href="{{ url('/admin') }}">Admin</a></li>
            @endcan
        </ul>
    </div>

    <div class="navbar-end gap-2">
        @auth
            <a href="{{ url('/ideas/create') }}" class="btn btn-primary btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                New idea
            </a>
            <form action="{{ url('/logout') }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline btn-sm" type="submit">Logout</button>
            </form>
        @else
            <a class="btn btn-primary btn-sm" href="{{ url('/register') }}">Register</a>
            <a class="btn btn-outline btn-sm" href="{{ route('login') }}">Log in</a>
        @endauth
    </div>
</div>


