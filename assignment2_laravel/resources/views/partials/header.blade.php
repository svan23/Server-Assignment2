<nav class="navbar navbar-expand-lg" style="background: linear-gradient(45deg, #f8e8ea, #f4d7d3); box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <div class="container">
        <a href="/" class="navbar-brand arizonia-text" style="font-size: 2.5rem;">Sugar & Slice</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav">
                <li class="nav-item d-flex align-items-center">
                    <a href="/about" class="nav-link arizonia-text" style="font-size: 1.25rem;">About</a>
                </li>
                @auth
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item d-flex align-items-center">
                            <a href="/admin/users" class="nav-link" style="font-weight: 500;">Admin</a>
                        </li>
                    @endif
                    <li class="nav-item d-flex align-items-center">
                        <form method="post" action="/logout" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link arizonia-text" style="padding: 0; font-size: 1.25rem;">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item d-flex align-items-center">
                        <a href="/login" class="nav-link" style="font-weight: 500;">Login</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="/register" class="nav-link" style="font-weight: 500;">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>