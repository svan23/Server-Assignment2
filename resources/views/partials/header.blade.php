<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a href="/" class="navbar-brand">Blog</a>
        <ul class="nav d-flex">
            @if(session('username'))
                <li class="nav-item">
                    <form method="post" action="/logout">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link" style="padding: 0;">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
            @endif
        </ul>
    </div>
</nav>