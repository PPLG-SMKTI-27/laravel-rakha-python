<header>
    <nav>
        <h1>RakhaWardhana.</h1>
        @if(request()->path() === '/' || request()->path() === 'home')
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        @endif
    </nav>
</header>
