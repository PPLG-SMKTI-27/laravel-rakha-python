{{-- resources/views/skills/index.blade.php --}}
@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

<style>
    /* GLOBAL THEME RE-DESIGN */
    :root {
        --bg-black: #050505;
        --neon-green: #00FF85;
        --neon-pink: #FF007A;
        --deep-gray: #121212;
        --border-gray: #222222;
        --text-white: #EDEDED;
        --text-muted: #777777;
    }

    body {
        background-color: var(--bg-black);
        color: var(--text-white);
        font-family: 'Space Mono', monospace;
        /* Sharper Dot Grid */
        background-image: radial-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px);
        background-size: 30px 30px;
    }

    /* NAV RE-DESIGN */
    .nav-brutal {
        display: flex;
        gap: 0; /* Merged look */
        margin-bottom: 50px;
    }

    .nav-item-brutal {
        border: 2px solid var(--border-gray);
        padding: 12px 30px;
        color: var(--text-muted);
        font-weight: 700;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 0.85rem;
        transition: all 0.2s ease;
        background: transparent;
    }

    .nav-item-brutal.active {
        background: var(--neon-pink);
        color: #000;
        border-color: var(--neon-pink);
        box-shadow: 6px 6px 0px var(--neon-green);
        z-index: 1;
    }

    /* STATUS BANNER RE-DESIGN */
    .status-banner {
        background: var(--neon-green);
        color: #000;
        padding: 18px 25px;
        font-weight: 900;
        text-transform: uppercase;
        margin-bottom: 60px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 2px solid #000;
        box-shadow: 10px 10px 0px rgba(0, 255, 133, 0.15);
    }

    .status-glitch {
        font-size: 0.7rem;
        opacity: 0.6;
    }

    /* SKILL GRID & CARDS */
    .skill-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 35px;
    }

    .skill-card-outer {
        background: var(--deep-gray);
        border: 2px solid var(--border-gray);
        padding: 30px;
        position: relative;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        flex-direction: column;
    }

    /* Alternating Neon Glow */
    .skill-card-outer:nth-child(odd) { border-bottom: 4px solid var(--neon-pink); }
    .skill-card-outer:nth-child(even) { border-bottom: 4px solid var(--neon-green); }

    .skill-card-outer:hover {
        transform: translate(-8px, -8px);
        border-color: #fff;
        box-shadow: 12px 12px 0px var(--neon-green);
    }

    .skill-card-outer:nth-child(odd):hover {
        box-shadow: 12px 12px 0px var(--neon-pink);
    }

    .label-tag {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 20px;
        letter-spacing: 2px;
        color: var(--text-muted);
    }

    .skill-card-outer:hover .label-tag {
        color: #fff;
    }

    .skill-title {
        font-size: 1.5rem;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 20px;
        color: #fff;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .skill-title i {
        color: var(--neon-green);
        font-size: 1.2rem;
    }

    .skill-desc {
        color: var(--text-muted);
        font-size: 0.9rem;
        line-height: 1.7;
        margin: 0;
        flex-grow: 1;
    }

    /* CONSOLE SECTION */
    .console-log {
        margin-top: 80px;
        padding: 25px;
        background: #000;
        border-top: 2px solid var(--border-gray);
        font-size: 0.75rem;
        color: #444;
        line-height: 2;
    }

    .console-cursor {
        display: inline-block;
        width: 8px;
        height: 15px;
        background: var(--neon-green);
        animation: blink 1s infinite;
        vertical-align: middle;
    }

    @keyframes blink { 50% { opacity: 0; } }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .skill-grid { grid-template-columns: 1fr; }
        .nav-brutal { flex-direction: column; }
    }
</style>

<div class="container py-5">
    <div class="nav-brutal">
        <div class="nav-item-brutal active">/SKILLS_ARCHIVE</div>
        <div class="nav-item-brutal">/DATABASE_ENTRY</div>
    </div>

    <div class="status-banner">
        <span><span style="opacity: 0.5">#</span> SYSTEM_READY: SKILLS_DATABASE_FEED_ACTIVE</span>
        <span class="status-glitch">V.2.0.48-STABLE</span>
    </div>

    <div class="mb-5">
        <h2 style="font-weight: 900; text-transform: uppercase; letter-spacing: 4px; font-size: 1.2rem;">
            <span style="color: var(--neon-pink)">//</span> LOADED_SKILLS
        </h2>
    </div>

    <div class="skill-grid">
        @forelse($skills as $skill)
            <div class="skill-card-outer">
                <div class="label-tag">HEX_REF: 0{{ $loop->iteration }}</div>
                
                <h3 class="skill-title">
                    <span style="color: var(--neon-green)">></span> 
                    {{ strtoupper($skill->name) }}
                </h3>
                
                <p class="skill-desc">
                    {{ $skill->description }}
                </p>
            </div>
        @empty
            <div style="grid-column: 1/-1; border: 2px dashed var(--border-gray); padding: 80px; text-align: center; color: var(--text-muted);">
                <div style="font-size: 2rem; margin-bottom: 10px;">[!]</div>
                CRITICAL_ERROR: NO_DATA_DETECTED_IN_SKILL_ARRAY
            </div>
        @endforelse
    </div>

    <div class="console-log">
        &gt; ACCESSING ENCRYPTED_VAULT... DONE<br>
        &gt; PARSING SKILL_MODULES... DONE<br>
        &gt; TOTAL_RECORDS_RETRIEVED: {{ $skills->count() }}<br>
        &gt; CURRENT_VIEW: PUBLIC_TERMINAL<br>
        &gt; SYSTEM_WAITING_FOR_INPUT<span class="console-cursor"></span>
    </div>
</div>
@endsection