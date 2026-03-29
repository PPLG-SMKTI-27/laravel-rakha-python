<header>
    <style>
        :root {
            --primary-glow: #00ff41;
            --secondary-glow: #ff0055;
            --bg-dark: #0a0a0a;
        }

        header {
            background: #000;
            padding: 12px 3%;
            border-bottom: 3px solid var(--primary-glow);
            position: sticky;
            top: 0;
            z-index: 1000;
            margin: 0;
        }

        header nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        header h1 {
            font-family: 'Permanent Marker', cursive;
            font-size: 1.5rem;
            color: var(--primary-glow);
            text-shadow: 2px 2px 0px var(--secondary-glow);
            letter-spacing: 1px;
            margin: 0;
            line-height: 1;
            white-space: nowrap;
            flex-shrink: 0;
        }

        header nav ul {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 16px;
            margin: 0;
            padding: 0;
            flex-wrap: nowrap;
            justify-content: flex-end;
        }

        header nav a,
        header nav button {
            font-family: 'Space Mono', monospace;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #fff;
            text-decoration: none;
            background: transparent;
            border: 0;
            padding: 4px 8px;
            cursor: pointer;
            transition: 0.2s;
        }

        header nav a:hover,
        header nav button:hover {
            color: var(--bg-dark);
            background: var(--primary-glow);
            box-shadow: 3px 3px 0px var(--secondary-glow);
        }

        @media (max-width: 640px) {
            header nav {
                flex-direction: row;
                align-items: center;
                gap: 12px;
            }

            header h1 {
                font-size: 1.2rem;
            }

            header nav ul {
                justify-content: center;
                gap: 8px;
                flex-wrap: wrap;
            }

            header nav a,
            header nav button {
                font-size: 0.75rem;
                padding: 3px 6px;
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
