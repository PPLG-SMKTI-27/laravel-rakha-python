<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEURAL_GATE // SKILLS_TERMINAL</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --bg-black: #050505;
            --surface: #111111;
            --accent: #00f3ff; /* Neon Cyan */
            --danger: #ff003c; /* Cyber Red */
            --success: #00ff41; /* Matrix Green */
            --text-main: #e0e0e0;
            --brutal-border: 4px solid #ffffff;
            --shadow-accent: 8px 8px 0px var(--accent);
            --shadow-danger: 8px 8px 0px var(--danger);
            --shadow-white: 8px 8px 0px #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-black);
            /* Grid Pattern */
            background-image: 
                linear-gradient(rgba(0, 243, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 243, 255, 0.03) 1px, transparent 1px);
            background-size: 30px 30px;
            font-family: 'Space Mono', monospace;
            color: var(--text-main);
            padding: 2rem;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Scanline Effect Overlay */
        body::before {
            content: " ";
            display: block;
            position: fixed;
            top: 0; left: 0; bottom: 0; right: 0;
            background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), 
                        linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
            z-index: 9999;
            background-size: 100% 2px, 3px 100%;
            pointer-events: none;
        }

        .wrapper {
            max-width: 1100px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* --- HEADER --- */
        header {
            background: var(--surface);
            border: var(--brutal-border);
            padding: 2.5rem;
            box-shadow: var(--shadow-accent);
            margin-bottom: 4rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            font-family: 'Syne', sans-serif;
            font-size: clamp(2rem, 5vw, 3.5rem);
            text-transform: uppercase;
            color: white;
            line-height: 1;
            letter-spacing: -2px;
        }

        .status-dot {
            width: 12px;
            height: 12px;
            background: var(--success);
            display: inline-block;
            margin-right: 10px;
            box-shadow: 0 0 10px var(--success);
        }

        /* --- BUTTONS --- */
        .btn-brutal {
            display: inline-block;
            padding: 1rem 1.5rem;
            background: white;
            color: black;
            text-decoration: none;
            font-weight: 800;
            text-transform: uppercase;
            border: 4px solid #000;
            box-shadow: 4px 4px 0px var(--accent);
            transition: 0.1s;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn-brutal:hover {
            transform: translate(-2px, -2px);
            box-shadow: 8px 8px 0px var(--accent);
            background: var(--accent);
        }

        .btn-brutal:active {
            transform: translate(4px, 4px);
            box-shadow: none;
        }

        .btn-danger { box-shadow: 4px 4px 0px var(--danger); }
        .btn-danger:hover { background: var(--danger); color: white; box-shadow: 8px 8px 0px #fff;}

        /* --- TABLE --- */
        .table-container {
            background: var(--surface);
            border: var(--brutal-border);
            box-shadow: var(--shadow-white);
            margin-bottom: 3rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: white;
            color: black;
        }

        th {
            padding: 1.2rem;
            text-align: left;
            text-transform: uppercase;
            border-bottom: 4px solid white;
        }

        td {
            padding: 1.2rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            color: #ccc;
        }

        tr:hover td {
            color: var(--accent);
            background: rgba(255,255,255,0.02);
        }

        .skill-name {
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
        }

        /* --- EMPTY STATE --- */
        .empty-state {
            padding: 5rem 2rem;
            text-align: center;
            border: 4px dashed var(--accent);
            background: var(--surface);
        }

        /* --- GLITCH ANIMATION --- */
        .glitch-text:hover {
            animation: glitch 0.2s steps(2) infinite;
        }

        @keyframes glitch {
            0% { text-shadow: 3px 0 var(--danger), -3px 0 var(--accent); }
            50% { text-shadow: -3px 0 var(--danger), 3px 0 var(--accent); transform: skew(2deg); }
            100% { text-shadow: 3px 0 var(--danger), -3px 0 var(--accent); }
        }

        /* --- SCROLLBAR --- */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: var(--bg-black); }
        ::-webkit-scrollbar-thumb { background: white; border: 2px solid var(--bg-black); }
    </style>
</head>
<body>

<div class="wrapper">
    <header>
        <div>
            <div style="margin-bottom: 10px; font-size: 0.8rem; font-weight: bold;">
                <span class="status-dot"></span> CONNECTION_STABLE // PORT:8080
            </div>
            <h1 class="glitch-text">SKILLS_VAULT</h1>
        </div>
        <a href="{{ route('dashboard.skills.create') }}" class="btn-brutal">
            <i class="fas fa-plus"></i> NEW_ENTRY
        </a>
    </header>

    @if($skills->count() > 0)
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>IDENTIFIER</th>
                    <th>DATA_STRING</th>
                    <th>LOG_DATE</th>
                    <th>OPERATIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($skills as $skill)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="skill-name">{{ strtoupper($skill->name) }}</td>
                    <td>{{ $skill->description ?? '[NO_DESC_PROVIDED]' }}</td>
                    <td>{{ $skill->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div style="display: flex; gap: 15px;">
                            <a href="{{ route('dashboard.skills.edit', $skill) }}" style="color: var(--accent); text-decoration: none; font-weight: bold;">
                                [EDIT]
                            </a>
                            <form action="{{ route('dashboard.skills.destroy', $skill) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: var(--danger); font-family: 'Space Mono'; font-weight: bold; cursor: pointer;">
                                    [ERASE]
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="empty-state">
        <h2 style="font-family: 'Syne'; color: white; margin-bottom: 1rem;">NO_DATA_DETECTED</h2>
        <p style="margin-bottom: 2rem;">The neural vault is currently empty. Initialize entry?</p>
        <a href="{{ route('dashboard.skills.create') }}" class="btn-brutal">INITIATE_UPLOAD</a>
    </div>
    @endif

    <footer>
        <a href="/skills" style="color: rgba(255,255,255,0.4); text-decoration: none; font-size: 0.9rem; border-bottom: 1px solid transparent; transition: 0.3s;">
            <i class="fas fa-arrow-left"></i> BACK_TO_MAIN_TERMINAL
        </a>
    </footer>
</div>

</body>
</html>