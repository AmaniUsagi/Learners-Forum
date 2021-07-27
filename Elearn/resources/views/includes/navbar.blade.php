<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Elearn</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto ">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact us</a>
            </li>

            {{-- Show when the user has logged in --}}

            {{-- <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-bell" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><i class="fa fa-user mr-2" aria-hidden="true"></i>Profile</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-cog mr-2" aria-hidden="true"></i>Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" style="color: crimson"><i class="fa fa-power-off mr-2" aria-hidden="true"></i>Sign out</a>
                </div>
            </li> --}}

            {{-- Show when the user has logged in --}}

        </ul>
        <div class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/login">Sign in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>