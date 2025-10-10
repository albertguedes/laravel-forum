<div class="container" >
    <div class="p-0 m-0 row w-100 justify-content-center" >
        <div class="col-9" >
            <ul class="nav justify-content-end" >
                @auth
                <li class="nav-item" >
                    <a class="nav-link fs-6" href="{{ route('profile') }}" >
                        <i class="fas fa-user"></i> Profile
                    </a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link fs-6" href="{{ route('auth.logout') }}" >
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
                @else
                <li class="nav-item" >
                    <a class="nav-link fs-6" href="{{ route('auth.login') }}" >
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link fs-6" href="{{ route('auth.register') }}" >
                        <i class="fas fa-user-plus"></i> Register
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</div>
