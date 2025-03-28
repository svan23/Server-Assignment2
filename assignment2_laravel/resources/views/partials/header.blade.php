<nav class="navbar navbar-expand-lg" 
     style="
       background-color: #dfbcc2; /* Dark background like NASA's */
       box-shadow: 0 2px 5px rgba(117, 83, 83, 0.1);
     ">
    <div class="container">
        <!-- Brand -->
        <a href="/" class="navbar-brand arizonia-text" 
           style="
             color: #fff; 
             font-size: 2.5rem; 
             text-transform: uppercase; 
             font-weight: 600;
           ">
            Sugar & Slice
        </a>

        <!-- Mobile Toggler -->
        <button class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarContent" 
                aria-controls="navbarContent" 
                aria-expanded="false" 
                aria-label="Toggle navigation"
                style="border: none; color: #fff;">
            <span class="navbar-toggler-icon" style="filter: invert(100%);"></span>
        </button>

        <!-- Nav Links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav">
                <!-- About -->
                <li class="nav-item d-flex align-items-center">
                    <a href="/about" class="nav-link" 
                       style="
                         color: #fff; 
                         font-size: 1rem; 
                         text-transform: uppercase; 
                         font-weight: 600; 
                         margin: 0 1rem;
                       ">
                        About
                    </a>
                </li>

                @auth
                    @if(Auth::user()->role === 'admin')
                        <!-- Admin -->
                        <li class="nav-item d-flex align-items-center">
                            <a href="/admin/users" class="nav-link" 
                               style="
                                 color: #fff; 
                                 font-size: 1rem; 
                                 text-transform: uppercase; 
                                 font-weight: 600; 
                                 margin: 0 1rem;
                               ">
                                Admin
                            </a>
                        </li>
                    @endif

                    <!-- Logout -->
                    <li class="nav-item d-flex align-items-center">
                        <form method="post" action="/logout" class="d-inline">
                            @csrf
                            <button type="submit" 
                                    class="nav-link btn btn-link" 
                                    style="
                                      color: #fff; 
                                      font-size: 1rem; 
                                      text-transform: uppercase; 
                                      font-weight: 600; 
                                      margin: 0 1rem; 
                                      padding: 0; 
                                      text-decoration: none;
                                      background: none;
                                    ">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <!-- Login -->
                    <li class="nav-item d-flex align-items-center">
                        <a href="/login" class="nav-link" 
                           style="
                             color: #fff; 
                             font-size: 1rem; 
                             text-transform: uppercase; 
                             font-weight: 600; 
                             margin: 0 1rem;
                           ">
                            Login
                        </a>
                    </li>
                    <!-- Register -->
                    <li class="nav-item d-flex align-items-center">
                        <a href="/register" class="nav-link" 
                           style="
                             color: #fff; 
                             font-size: 1rem; 
                             text-transform: uppercase; 
                             font-weight: 600; 
                             margin: 0 1rem;
                           ">
                            Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
