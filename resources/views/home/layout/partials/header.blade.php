<header>
    <a href="/" class="logo">
        <!-- <i class="fab fa-node-js"></i>  -->
        {{short_name($user->full_name)}}
    </a>
    <div id="menu" class="fas fa-bars"></div>

    <nav class="navbar">
        <ul>
            <li><a href="{{ route('home.index') }}" class="{{ request()->routeIs('home.index') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('home.about') }}" class="{{ request()->routeIs('home.about') ? 'active' : '' }}">About</a></li>
            <li><a href="{{ route('home.service') }}" class="{{ request()->routeIs('home.service') ? 'active' : '' }}">Services</a></li>
            <li><a href="{{ route('home.blog') }}" class="{{ request()->routeIs('home.blog') ? 'active' : '' }}">Blog</a></li>
            <li><a href="{{ route('home.project') }}" class="{{ request()->routeIs('home.project') ? 'active' : '' }}">Project</a></li>
            <li><a href="{{ route('home.contact') }}" class="{{ request()->routeIs('home.contact') ? 'active' : '' }}">Contact</a></li>
        </ul>
    </nav>
</header>