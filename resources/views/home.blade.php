@extends('layouts.app')

@section('title', 'Portfolio | Rakha')

@section('styles')
    @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Bungee&family=Space+Mono:wght@400;700&family=Poppins:wght@400;800&display=swap');

    :root {
        --primary-glow: #00ff41; /* Acid Green */
        --secondary-glow: #ff0055; /* Hot Pink */
        --bg-dark: #0a0a0a;
        --concrete: #1a1a1a;
    }

    body {
        background-color: var(--bg-dark);
        background-image: 
            radial-gradient(circle at 2px 2px, rgba(255,255,255,0.05) 1px, transparent 0);
        background-size: 40px 40px;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        overflow-x: hidden;
    }

    /* BACKGROUND OVERLAY (Texture) */
    body::before {
        content: "";
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background: url('https://www.transparenttextures.com/patterns/asfalt-dark.png');
        opacity: 0.4;
        z-index: -1;
        pointer-events: none;
    }

    /* CUSTOM NAVBAR */
    header {
        background: rgba(0, 0, 0, 0.8);
        padding: 15px 5%;
        border-bottom: 4px solid var(--primary-glow);
        transform: skewY(-1deg);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        transform: skewY(1deg);
    }

    .logo-tag {
        font-family: 'Permanent Marker', cursive;
        font-size: clamp(1.2rem, 5vw, 2rem);
        color: var(--primary-glow);
        text-shadow: 3px 3px 0px var(--secondary-glow);
        letter-spacing: 2px;
    }

    /* HERO SECTION */
    .hero {
        min-height: 60vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        padding: 20px 5%;
    }

    @media (min-width: 768px) {
        .hero {
            min-height: 80vh;
            padding: 50px 10%;
        }
    }

    .hero-tag {
        font-family: 'Bungee', cursive;
        font-size: clamp(2rem, 8vw, 6rem);
        line-height: 0.9;
        margin-bottom: 15px;
        position: relative;
        z-index: 2;
    }

    .hero-tag span {
        display: block;
        color: transparent;
        -webkit-text-stroke: 2px #fff;
        transition: 0.3s;
    }

    .hero-tag .name {
        color: var(--secondary-glow);
        -webkit-text-stroke: 0px;
        text-shadow: 5px 5px 0px var(--primary-glow);
        transform: rotate(-3deg);
        display: inline-block;
    }

    .hero-sub {
        font-family: 'Space Mono', monospace;
        background: var(--primary-glow);
        color: #000;
        padding: 5px 15px;
        font-weight: bold;
        transform: rotate(1deg);
        margin-bottom: 20px;
        font-size: clamp(0.75rem, 2vw, 1rem);
        white-space: normal;
        display: inline-block;
        max-width: 100%;
    }

    /* BUTTONS */
    .btn-graffiti {
        font-family: 'Permanent Marker', cursive;
        font-size: clamp(1rem, 3vw, 1.5rem);
        background: #fff;
        color: #000;
        padding: clamp(8px, 3vw, 10px) clamp(20px, 5vw, 40px);
        text-decoration: none;
        border: 4px solid #000;
        box-shadow: 8px 8px 0px var(--primary-glow);
        transition: 0.2s;
        position: relative;
        display: inline-block;
    }

    .btn-graffiti:hover {
        transform: translate(-4px, -4px);
        box-shadow: 12px 12px 0px var(--secondary-glow);
    }

    /* PHOTO STYLING */
    .photo-container {
        position: relative;
        margin-top: 20px;
    }

    @media (min-width: 768px) {
        .photo-container {
            margin-top: 50px;
        }
    }

    .photo-container img {
        width: clamp(150px, 50vw, 250px);
        height: clamp(150px, 50vw, 250px);
        object-fit: cover;
        border: clamp(5px, 2vw, 10px) solid #fff;
        transform: rotate(5deg);
        filter: grayscale(100%) contrast(120%);
        transition: 0.3s;
    }

    .photo-container:hover img {
        filter: grayscale(0%);
        transform: rotate(0deg) scale(1.1);
    }

    .photo-container::after {
        content: "RAKHA";
        position: absolute;
        bottom: -10px;
        right: -20px;
        font-family: 'Permanent Marker', cursive;
        background: var(--secondary-glow);
        padding: 5px 20px;
        transform: rotate(-10deg);
        font-size: clamp(0.75rem, 2vw, 1rem);
    }

    /* SKILLS STYLING (Poster/Sticker Style) */
    .skills-grid {
        display: flex;
        flex-wrap: wrap;
        gap: clamp(10px, 3vw, 20px);
        justify-content: center;
        padding: clamp(20px, 5vw, 50px) 0;
    }

    .skill-sticker {
        background: #eee;
        color: #000;
        padding: clamp(10px, 2vw, 15px) clamp(15px, 4vw, 30px);
        font-weight: 800;
        font-family: 'Bungee', cursive;
        border: 2px solid #000;
        transform: rotate(calc(var(--r, 0) * 1deg));
        transition: 0.3s;
        cursor: pointer;
        font-size: clamp(0.7rem, 2vw, 1rem);
    }

    .skill-sticker:nth-child(odd) { --r: -5; }
    .skill-sticker:nth-child(even) { --r: 5; }

    .skill-sticker:hover {
        background: var(--primary-glow);
        transform: scale(1.2) rotate(0deg);
        z-index: 10;
    }

    .btn-manage {
        display: inline-block;
        background: var(--primary-glow);
        color: #000;
        padding: 10px 20px;
        font-family: 'Bungee', cursive;
        font-weight: 800;
        border: 2px solid #000;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-manage:hover {
        background: var(--secondary-glow);
        transform: scale(1.1);
    }

    /* SECTION TITLES */
    .section-title {
        font-family: 'Permanent Marker', cursive;
        font-size: clamp(1.5rem, 6vw, 3rem);
        text-align: center;
        margin-bottom: clamp(20px, 5vw, 50px);
        text-decoration: underline wavy var(--secondary-glow);
    }

    /* CONTACT SECTION */
    .contact-card {
        background: #111;
        border-left: 10px solid var(--primary-glow);
        padding: clamp(20px, 5vw, 40px);
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        font-size: clamp(0.9rem, 2vw, 1rem);
    }

    .contact-card::before {
        content: "INFO";
        position: absolute;
        top: -20px;
        left: 20px;
        background: #fff;
        color: #000;
        padding: 2px 15px;
        font-weight: bold;
        font-size: clamp(0.7rem, 1.5vw, 0.9rem);
    }

    footer {
        text-align: center;
        padding: clamp(20px, 5vw, 40px);
        font-family: 'Space Mono', monospace;
        border-top: 1px dashed #444;
        font-size: clamp(0.8rem, 2vw, 1rem);
    }

    #about {
        padding: clamp(40px, 10vw, 100px) 5%;
    }

    #skills {
        background: #050505;
        padding: clamp(40px, 8vw, 80px) clamp(5%, 3vw, 5%);
    }

    #contact {
        padding: clamp(40px, 10vw, 100px) 5%;
    }

    #about > div {
        font-size: clamp(1rem, 2vw, 1.2rem);
        line-height: 1.8;
        color: #ccc;
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }
@endsection

@section('content')

<section class="hero">
    <div class="hero-tag">
        <span>I AM</span>
        <div class="name">RAKHA</div>
    </div>
    <p class="hero-sub">SOFTWARE ENGINEER // WEB ARCHITECT // PLUGIN DEV</p>
    
    <a href="{{ route('project.dashboard') }}" class="btn-graffiti">
        OPEN_PROJECTS.exe
    </a>

    <div class="photo-container">
        <img src="{{ asset('img/foto-rakha.jpg') }}" alt="Rakha Profile">
    </div>
</section>

<section id="about">
    <h2 class="section-title">MISSION_STATEMENT</h2>
    <div>
        <p>
            Halo! Saya <span style="color: var(--primary-glow); font-weight: bold;">Rakha</span>. 
            Seorang individu yang terobsesi dengan struktur kode dan estetika digital. 
            Saya tidak hanya menulis kode, saya membangun solusi. Setiap baris script adalah media eksplorasi saya 
            untuk memahami ekosistem web yang terus berevolusi.
        </p>
    </div>
</section>

<section id="skills">
    <h2 class="section-title">TECH_STACK</h2>
    <div class="skills-grid">
        @foreach($skills as $skill)
        <div class="skill-sticker">{{ $skill->name }}</div>
        @endforeach
    </div>
</section>

<section id="contact">
    <h2 class="section-title">GET_IN_TOUCH</h2>
    <div class="contact-card">
        <p style="margin-bottom: 15px;">> EMAIL: <span style="color: var(--primary-glow)">raditrakawar1@gmail.com</span></p>
        <p style="margin-bottom: 15px;">> GITHUB: <span style="color: var(--primary-glow)">github.com/rakha-python</span></p>
        <p style="margin-bottom: 15px;">> INSTA: <span style="color: var(--primary-glow)">@raditzzz01</span></p>
    </div>
</section>

@endsection

@section('footer')
<footer>
    <p>© 2026 RAKHA_SYSTEMS. ALL RIGHTS RESERVED. <br> 
    <small style="color: #666">BUILT WITH LARAVEL & ADRENALINE</small></p>
</footer>
@endsection