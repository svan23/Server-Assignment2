<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a href="/" class="navbar-brand">Blog</a>
        <ul class="nav d-flex align-items-center ms-auto">
            @if(session('username'))
                @if(session('role') === 'admin')
                    <li class="nav-item">
                        <a href="/admin/users" class="nav-link">Admin</a>
                    </li>
                @endif
                <li class="nav-item">
                    <form method="post" action="/logout">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link" style="padding: 0;">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="/register" class="nav-link">Register</a></li>
            @endif
        </ul>
    </div>
</nav>