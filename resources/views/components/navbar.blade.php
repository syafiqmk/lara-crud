    <nav class="navbar navbar-expand-sm navbar-dark bg-danger mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Laravel CRUD</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="/" class="nav-link {{ Request::is('/') ? 'active' : ''}}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        @auth
                            <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown">
                                <li><a href="/dashboard" class="dropdown-item">Dashboard</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>

                            @else
                            <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : ''}}">Login</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>