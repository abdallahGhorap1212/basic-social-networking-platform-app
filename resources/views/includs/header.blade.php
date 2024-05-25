<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Neno</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="btn btn-light " aria-current="page" href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="{{ route('account') }}">Account</a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav navbar-right">
                {{-- <li><a href="{{ route('account') }}">Account</a></li> --}}
                <li><a class="btn btn-outline-danger" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </nav>
</header>
