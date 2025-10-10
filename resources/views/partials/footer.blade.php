<div class="row" >
    <div class="col-12" >
        <ul class="nav justify-content-center" >
            <li class="nav-item" >
                <a class="nav-link" href="{{ route('home') }}" ><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="{{ route('about') }}" ><i class="fas fa-info-circle"></i> About</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="{{ route('contact') }}" ><i class="fas fa-envelope"></i> Contact</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="{{ route('rss') }}" ><i class="fas fa-rss"></i> Follow-us</a>
            </li>
            <li class="nav-item" >
                <strong>|</strong>
            </li>
            @auth
            <li class="nav-item" >
                <a class="nav-link" href="{{ route('profile') }}" ><i class="fas fa-user"></i> Profile</a>
            </li>
            <li class="nav-item" >
                <a id="logout" class="nav-link text-danger fs-5" href="" >
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" >
                    @csrf
                </form>
            </li>
            @else
            <li class="nav-item" >
                <a class="nav-link" href="{{ route('auth.login') }}" ><i class="fas fa-sign-in-alt"></i> Login</a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="{{ route('auth.register') }}" ><i class="fas fa-user-plus"></i> Register</a>
            </li>
            @endauth
        </ul>
    </div>
    <div class="py-5 col-12" >
        <p class="p-0 m-0 text-center" ><strong>Laravel Forum</strong> {{ date('Y') }} - <em>Free & Open Source.</em></p>
    </div>
</div>
