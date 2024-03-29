<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a
            class="navbar-brand"
            href="#"
        >Navbar</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div
            class="collapse navbar-collapse"
            id="navbarNavAltMarkup"
        >
            <div class="navbar-nav">
                <a
                    class="nav-link active"
                    aria-current="page"
                    href="/"
                >Home</a>
                @if (!auth()->check())
                <a
                    class="nav-link"
                    href="/login"
                >Login</a>
                <a
                    class="nav-link"
                    href="/register"
                >Register</a>
                @else
                <a
                    class="nav-link"
                    href="/"
                >{{auth()->user()->name}}</a>
                <form
                    action="/logout"
                    method="POST"
                >
                    @csrf
                    <button class="btn btn-danger">logout</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</nav>