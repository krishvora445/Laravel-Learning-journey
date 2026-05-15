<div class="navbar bg-base-100 shadow-sm">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /> </svg>
            </div>
            <ul
                tabindex="-1"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li><a href="/">Home</a></li>
                @auth
                <li><a href="/ideas">Ideas</a></li>
                @else
                <li><a href="/login">Ideas</a></li>
                @endauth
                <li><a href="/about">About</a></li>
                @can('view-admin')
                    <li><a href="/admin">Admin</a></li>
                @endcan
            </ul>
        </div>
        <a class="btn btn-ghost text-xl">The Idea Company</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="/">Home</a></li>
            @auth
                <li><a href="/ideas">Ideas</a></li>
            @else
                <li><a href="/login">Ideas</a></li>
            @endauth
            <li><a href="/about">About</a></li>
            @can('view-admin')
            <li><a href="/admin">Admin</a></li>
            @endcan
        </ul>
    </div>
    <div class="navbar-end gap-0.5">
        @auth()
        <a class="btn" href="/ideas/create"><img class="text-3xl pb-2" src="/public/images/addIcon.png" alt="+"/></a>
                <form action="/logout" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn" type="submit">Logout</button>
                </form>
        @else
            <a class="btn" href="/register"><img class="text-3xl pb-2" src="/public/images/addIcon.png" alt="+"/></a>
            <a class="btn" href="/register">Register</a>
            <a class="btn" href="/login">Log In</a>

        @endauth

    </div>
</div>


