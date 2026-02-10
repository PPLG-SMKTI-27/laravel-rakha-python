<header>
    <style>
        :root {
            --primary-glow: #00ff41;
            --secondary-glow: #ff0055;
            --bg-dark: #0a0a0a;
        }

        header {
            background: rgba(0, 0, 0, 0.8);
            padding: 15px 5%;
            border-bottom: 4px solid var(--primary-glow);
            transform: skewY(-1deg);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            transform: skewY(1deg);
            gap: 24px;
        }

        header h1 {
            font-family: 'Permanent Marker', cursive;
            font-size: 2rem;
            color: var(--primary-glow);
            text-shadow: 3px 3px 0px var(--secondary-glow);
            letter-spacing: 2px;
            margin: 0;
            line-height: 1;
            white-space: nowrap;
        }

        header nav ul {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 24px;
            margin: 0;
            padding: 0;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        header nav a,
        header nav button {
            font-family: 'Space Mono', monospace;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #fff;
            text-decoration: none;
            background: transparent;
            border: 0;
            padding: 6px 10px;
            cursor: pointer;
            transition: 0.25s;
        }

        header nav a:hover,
        header nav button:hover {
            color: var(--bg-dark);
            background: var(--primary-glow);
            box-shadow: 4px 4px 0px var(--secondary-glow);
        }

        @media (max-width: 640px) {
            header nav {
                flex-direction: column;
                align-items: flex-start;
            }

            header nav ul {
                justify-content: flex-start;
                gap: 12px;
            }
        }
    </style>
    <nav>
        <h1>RakhaWardhana.</h1>
        
        @if(request()->path() === '/' || request()->path() === 'home')
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="{{ route('skills.index') }}">Skills</a></li>
                <li><a href="#contact">Contact</a></li>
                @auth
                    <li><a href="{{ route('dashboard') }}" style="color: var(--primary-glow); font-weight: bold;">Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" style="color: var(--secondary-glow); font-weight: bold;">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" style="color: var(--primary-glow); font-weight: bold;">Login</a></li>
                @endauth
            </ul>
        @else
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('skills.index') }}">Skills</a></li>
                @auth
                    <li><a href="{{ route('dashboard') }}" style="color: var(--primary-glow); font-weight: bold;">Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" style="color: var(--secondary-glow); font-weight: bold;">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" style="color: var(--primary-glow); font-weight: bold;">Login</a></li>
                @endauth
            </ul>
        @endif
    </nav>
</header>
