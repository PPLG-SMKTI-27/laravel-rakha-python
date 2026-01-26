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
        font-size: 2rem;
        color: var(--primary-glow);
        text-shadow: 3px 3px 0px var(--secondary-glow);
        letter-spacing: 2px;
    }

    /* HERO SECTION */
    .hero {
        min-height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        padding: 50px 10%;
    }

    .hero-tag {
        font-family: 'Bungee', cursive;
        font-size: clamp(3rem, 10vw, 6rem);
        line-height: 0.9;
        margin-bottom: 20px;
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
        margin-bottom: 30px;
    }

    /* BUTTONS */
    .btn-graffiti {
        font-family: 'Permanent Marker', cursive;
        font-size: 1.5rem;
        background: #fff;
        color: #000;
        padding: 10px 40px;
        text-decoration: none;
        border: 4px solid #000;
        box-shadow: 8px 8px 0px var(--primary-glow);
        transition: 0.2s;
        position: relative;
    }

    .btn-graffiti:hover {
        transform: translate(-4px, -4px);
        box-shadow: 12px 12px 0px var(--secondary-glow);
    }

    /* PHOTO STYLING */
    .photo-container {
        position: relative;
        margin-top: 50px;
    }

    .photo-container img {
        width: 250px;
        height: 250px;
        object-fit: cover;
        border: 10px solid #fff;
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
    }

    /* SKILLS STYLING (Poster/Sticker Style) */
    .skills-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        padding: 50px 0;
    }

    .skill-sticker {
        background: #eee;
        color: #000;
        padding: 15px 30px;
        font-weight: 800;
        font-family: 'Bungee', cursive;
        border: 2px solid #000;
        transform: rotate(calc(var(--r, 0) * 1deg));
        transition: 0.3s;
        cursor: pointer;
    }

    .skill-sticker:nth-child(odd) { --r: -5; }
    .skill-sticker:nth-child(even) { --r: 5; }

    .skill-sticker:hover {
        background: var(--primary-glow);
        transform: scale(1.2) rotate(0deg);
        z-index: 10;
    }

    /* SECTION TITLES */
    .section-title {
        font-family: 'Permanent Marker', cursive;
        font-size: 3rem;
        text-align: center;
        margin-bottom: 50px;
        text-decoration: underline wavy var(--secondary-glow);
    }

    /* CONTACT SECTION */
    .contact-card {
        background: #111;
        border-left: 10px solid var(--primary-glow);
        padding: 40px;
        max-width: 600px;
        margin: 0 auto;
        position: relative;
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
    }

    footer {
        text-align: center;
        padding: 40px;
        font-family: 'Space Mono', monospace;
        border-top: 1px dashed #444;
    }

    @media (max-width: 768px) {
        .hero-tag { font-size: 3.5rem; }
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

<section id="about" style="padding: 100px 10%;">
    <h2 class="section-title">MISSION_STATEMENT</h2>
    <div style="font-size: 1.2rem; line-height: 2; color: #ccc; max-width: 800px; margin: 0 auto; text-align: center;">
        <p>
            Halo! Saya <span style="color: var(--primary-glow); font-weight: bold;">Rakha</span>. 
            Seorang individu yang terobsesi dengan struktur kode dan estetika digital. 
            Saya tidak hanya menulis kode, saya membangun solusi. Setiap baris script adalah media eksplorasi saya 
            untuk memahami ekosistem web yang terus berevolusi.
        </p>
    </div>
</section>

<section id="skills" style="background: #050505; padding: 80px 5%;">
    <h2 class="section-title">TECH_STACK</h2>
    <div class="skills-grid">
        <div class="skill-sticker">HTML</div>
        <div class="skill-sticker">CSS</div>
        <div class="skill-sticker">JAVASCRIPT</div>
        <div class="skill-sticker">PHP</div>
        <div class="skill-sticker">MYSQL</div>
        <div class="skill-sticker">C++</div>
    </div>
</section>

<section id="contact" style="padding: 100px 10%;">
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