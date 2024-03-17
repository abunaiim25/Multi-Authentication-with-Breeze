<div class="menu-bar">
    <h1 class="logo">Light<span>Code.</span></h1>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Pages <i class="fas fa-caret-down"></i></a>

            <div class="dropdown-menu">
                <ul>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li>
                        <a href="#">Team <i class="fas fa-caret-right"></i></a>

                        <div class="dropdown-menu-1">
                            <ul>
                                <li><a href="#">Team-1</a></li>
                                <li><a href="#">Team-2</a></li>
                                <li><a href="#">Team-3</a></li>
                                <li><a href="#">Team-4</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
        </li>
        <li><a href="#">Blog</a>
        </li>
        <li><a href="#">Contact us</a></li>


        @if (Route::has('login'))
            @auth
                <li><a href="#">Profile <i class="fas fa-caret-down"></i></a>

                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            @else
                <li><a href="{{ route('login') }}">Login</a></li>

                <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
        @endif
    </ul>
</div>


