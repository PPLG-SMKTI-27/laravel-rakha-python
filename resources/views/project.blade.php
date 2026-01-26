@extends('layouts.app')

@section('title', 'Projects | Rakha')

@section('styles')
    @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Bungee&family=Space+Mono:wght@400;700&family=Poppins:wght@400;800&display=swap');

    :root {
        --primary-glow: #00ff41; /* Acid Green */
        --secondary-glow: #ff0055; /* Hot Pink */
        --bg-dark: #0a0a0a;
    }

    .container {
        padding: 120px 10% 80px; /* Padding top lebih besar karena fixed header */
        position: relative;
        z-index: 1;
    }

    /* SECTION TITLE GRAFFITI */
    .section-title {
        font-family: 'Permanent Marker', cursive;
        font-size: clamp(2.5rem, 8vw, 4rem);
        text-align: center;
        margin-bottom: 60px;
        color: #fff;
        text-shadow: 4px 4px 0px var(--secondary-glow);
        transform: rotate(-2deg);
    }

    .intro-text {
        font-family: 'Space Mono', monospace;
        text-align: center;
        background: var(--primary-glow);
        color: #000;
        display: table;
        margin: -40px auto 50px;
        padding: 5px 20px;
        font-weight: bold;
        transform: rotate(1deg);
    }

    /* PROJECTS GRID */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 40px;
        margin-top: 30px;
    }

    /* PROJECT CARD STYLE (Poster/Sticker) */
    .project-card {
        background: #1a1a1a;
        padding: 40px 30px;
        border: 3px solid #fff;
        position: relative;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: default;
        box-shadow: 10px 10px 0px var(--primary-glow);
    }

    /* Variasi rotasi acak agar terlihat seperti ditempel manual */
    .project-card:nth-child(odd) { transform: rotate(-1.5deg); }
    .project-card:nth-child(even) { transform: rotate(1.5deg); }

    .project-card:hover {
        transform: scale(1.05) rotate(0deg) !important;
        box-shadow: 15px 15px 0px var(--secondary-glow);
        z-index: 10;
        background: #222;
    }

    .project-card h3 {
        font-family: 'Bungee', cursive;
        color: var(--primary-glow);
        font-size: 1.5rem;
        margin-bottom: 15px;
        border-bottom: 2px dashed #444;
        padding-bottom: 10px;
    }

    .project-card p {
        font-family: 'Poppins', sans-serif;
        color: #ccc;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* LABEL TAGS */
    .project-card::before {
        content: "BUILD_V.26";
        position: absolute;
        top: -15px;
        right: 10px;
        background: var(--secondary-glow);
        color: #fff;
        font-family: 'Space Mono', monospace;
        font-size: 0.7rem;
        padding: 2px 8px;
        font-weight: bold;
    }

    /* BUTTONS STYLE */
    .back-nav {
        margin-top: 80px;
        display: flex;
        justify-content: center;
        gap: 25px;
        flex-wrap: wrap;
    }

    .btn-urban {
        font-family: 'Permanent Marker', cursive;
        font-size: 1.2rem;
        padding: 12px 30px;
        text-decoration: none;
        transition: 0.2s;
        border: 3px solid #000;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-github {
        background: #fff;
        color: #000;
        box-shadow: 6px 6px 0px var(--primary-glow);
    }

    .btn-home {
        background: var(--bg-dark);
        color: var(--primary-glow);
        border-color: var(--primary-glow);
        box-shadow: 6px 6px 0px var(--secondary-glow);
    }

    .btn-urban:hover {
        transform: translate(-3px, -3px);
        box-shadow: 10px 10px 0px #fff;
    }

    @media (max-width: 768px) {
        .container { padding: 100px 5% 50px; }
        .section-title { font-size: 2.5rem; }
    }
@endsection

@section('content')

<div class="container">
    <h2 class="section-title">PROJECT_LOGS</h2>

    <p class="intro-text">OPERATOR: <strong>{{ $name ?? 'RAKHA' }}</strong></p>

    <div class="projects-grid">
        @foreach($projects as $project)
            <div class="project-card">
                <h3>{{ $project['title'] }}</h3>
                <p>{{ $project['description'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="back-nav">
        <a href="https://github.com/rakha-python" target="_blank" rel="noopener noreferrer" class="btn-urban btn-github">
            CODE_STORAGE [GH]
        </a>
        <a href="/" class="btn-urban btn-home">
            RETURN_TO_BASE
        </a>
    </div>
</div>

@endsection

@section('footer')
<footer>
    <p>© 2026 RAKHA_SYSTEMS. UNAUTHORIZED ACCESS IS PROHIBITED. <br> 
    <small style="color: #444; font-size: 0.7rem;">ENCRYPTED_PORTFOLIO_V1.0</small></p>
</footer>
@endsection