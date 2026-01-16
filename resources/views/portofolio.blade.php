<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Rakha</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Space+Mono:wght@400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0a0e27 0%, #1a1a3e 50%, #0f0f2e 100%);
            color: #e5e7eb;
            line-height: 1.6;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 50%, rgba(0, 255, 200, 0.08) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(255, 0, 150, 0.08) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* NAVBAR */
        header {
            background: rgba(2, 6, 23, 0.95);
            padding: 20px 10%;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 2px solid rgba(0, 255, 200, 0.3);
            box-shadow: 0 0 20px rgba(0, 255, 200, 0.1);
            backdrop-filter: blur(10px);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav h1 {
            color: #00ffc8;
            font-size: 26px;
            font-weight: 700;
            text-shadow: 0 0 10px rgba(0, 255, 200, 0.5);
            letter-spacing: 2px;
            animation: glowPulse 2s ease-in-out infinite;
        }

        @keyframes glowPulse {
            0%, 100% {
                text-shadow: 0 0 10px rgba(0, 255, 200, 0.5), 0 0 20px rgba(0, 255, 200, 0.3);
            }
            50% {
                text-shadow: 0 0 20px rgba(0, 255, 200, 0.8), 0 0 30px rgba(0, 255, 200, 0.5);
            }
        }

        nav ul {
            display: flex;
            gap: 30px;
            list-style: none;
        }

        nav ul li {
            position: relative;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        nav ul li::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #00ffc8, #ff00aa);
            transition: width 0.3s ease;
        }

        nav ul li:hover {
            color: #00ffc8;
            text-shadow: 0 0 10px rgba(0, 255, 200, 0.6);
        }

        nav ul li:hover::after {
            width: 100%;
        }

        /* HERO */
        .hero {
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 50px;
            padding: 0 10%;
            position: relative;
            z-index: 1;
        }

        .hero-text h2 {
            font-size: 48px;
            margin-bottom: 15px;
            font-weight: 700;
            animation: slideInLeft 0.8s ease;
            line-height: 1.2;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-text span {
            background: linear-gradient(135deg, #00ffc8, #ff00aa, #0088ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(0, 255, 200, 0.3);
            animation: neonFlicker 3s ease-in-out infinite;
        }

        @keyframes neonFlicker {
            0%, 18%, 22%, 25%, 54%, 56%, 100% {
                text-shadow: 0 0 10px rgba(0, 255, 200, 0.5);
            }
            20%, 24%, 55% {
                text-shadow: 0 0 2px rgba(0, 255, 200, 0.1);
            }
        }

        .hero-text p {
            max-width: 500px;
            margin: 25px 0;
            color: #cbd5f5;
            font-size: 16px;
            animation: slideInLeft 0.8s ease 0.2s both;
            line-height: 1.8;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #00ffc8 0%, #00dd88 100%);
            color: #0a0e27;
            padding: 14px 35px;
            border-radius: 8px;
            font-weight: 700;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 255, 200, 0.4);
            animation: slideInLeft 0.8s ease 0.4s both;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 255, 200, 0.6), 0 0 40px rgba(0, 255, 200, 0.3);
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .btn:hover::before {
            left: 100%;
        }

        .hero-photo {
            flex-shrink: 0;
            animation: slideInRight 0.8s ease;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-photo img {
            width: 280px;
            height: 280px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #00ffc8;
            box-shadow: 0 0 30px rgba(0, 255, 200, 0.6),
                        0 0 60px rgba(255, 0, 150, 0.3),
                        inset 0 0 30px rgba(0, 255, 200, 0.2);
            transition: all 0.3s ease;
            position: relative;
        }

        .hero-photo img:hover {
            transform: scale(1.05) rotate(5deg);
            box-shadow: 0 0 40px rgba(0, 255, 200, 0.8),
                        0 0 80px rgba(255, 0, 150, 0.5),
                        inset 0 0 40px rgba(0, 255, 200, 0.3);
        }

        /* SECTION */
        section {
            padding: 80px 10%;
            position: relative;
            z-index: 1;
        }

        section h2 {
            font-size: 36px;
            margin-bottom: 50px;
            text-align: center;
            font-weight: 700;
            position: relative;
            display: inline-block;
            width: 100%;
        }

        section h2::before {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, #00ffc8, #ff00aa);
            box-shadow: 0 0 20px rgba(0, 255, 200, 0.6);
        }

        /* ABOUT */
        .about p {
            max-width: 700px;
            margin: 50px auto 0;
            text-align: center;
            color: #cbd5f5;
            font-size: 16px;
            line-height: 1.8;
        }

        /* SKILLS */
        .skills-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .skill {
            background: linear-gradient(135deg, rgba(0, 255, 200, 0.1), rgba(255, 0, 150, 0.1));
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            border: 2px solid rgba(0, 255, 200, 0.3);
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 255, 200, 0.2);
        }

        .skill::before {
            content: '';
            position: absolute;
            top: -100%;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #00ffc8, #ff00aa);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: -1;
        }

        .skill:hover {
            transform: translateY(-8px);
            border-color: #00ffc8;
            color: #00ffc8;
            text-shadow: 0 0 10px rgba(0, 255, 200, 0.5);
            box-shadow: 0 8px 30px rgba(0, 255, 200, 0.4), 0 0 20px rgba(255, 0, 150, 0.2);
        }

        /* PROJECTS */
        .projects {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .project-card {
            background: linear-gradient(135deg, rgba(0, 255, 200, 0.05), rgba(255, 0, 150, 0.05));
            padding: 30px;
            border-radius: 12px;
            border: 2px solid rgba(0, 255, 200, 0.2);
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 255, 200, 0.1);
        }

        .project-card::before {
            content: '';
            position: absolute;
            top: -100%;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0, 255, 200, 0.1), rgba(255, 0, 150, 0.1));
            transition: all 0.5s ease;
            z-index: 0;
        }

        .project-card:hover::before {
            top: 0;
        }

        .project-card:hover {
            transform: translateY(-12px);
            border-color: #00ffc8;
            box-shadow: 0 15px 40px rgba(0, 255, 200, 0.3),
                        0 0 30px rgba(255, 0, 150, 0.2),
                        inset 0 1px 0 rgba(0, 255, 200, 0.2);
        }

        .project-card h3 {
            color: #00ffc8;
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: 600;
            position: relative;
            z-index: 1;
            text-shadow: 0 0 10px rgba(0, 255, 200, 0.3);
        }

        .project-card p {
            color: #cbd5f5;
            position: relative;
            z-index: 1;
            line-height: 1.6;
        }

        /* CONTACT */
        .contact {
            text-align: center;
        }

        .contact p {
            margin-bottom: 15px;
            color: #cbd5f5;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .contact p:hover {
            color: #00ffc8;
            text-shadow: 0 0 10px rgba(0, 255, 200, 0.4);
        }

        footer {
            text-align: center;
            padding: 25px;
            background: rgba(2, 6, 23, 0.95);
            color: #94a3b8;
            border-top: 2px solid rgba(0, 255, 200, 0.2);
            box-shadow: 0 -5px 20px rgba(0, 255, 200, 0.1);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            nav ul {
                display: none;
            }

            .hero {
                flex-direction: column;
                gap: 40px;
                padding: 40px 10%;
            }

            .hero-text h2 {
                font-size: 36px;
            }

            .hero-photo {
                order: -1;
            }

            section {
                padding: 60px 10%;
            }

            section h2 {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>

<header>
    <nav>
        <h1>RakhaWardhana.</h1>
        <ul>
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
</header>

<section class="hero">
    <div class="hero-text">
        <h2>Halo, Saya <span>Rakha</span></h2>
        <p>Seorang software engineer yang tertarik pada web development, backend, dan plugin development.</p>
        <a href="{{ route('projects') }}" class="btn">
    Lihat Project
</a>

    </div>
</section>

<section id="about" class="about">
    <h2>About Me</h2>
    <p>
        Halo! Saya Rakha, seseorang yang sedang mendalami dunia software engineering. Saya suka membangun project web sebagai media belajar dan eksplorasi teknologi. Setiap project yang saya buat membantu saya memahami cara kerja sistem, pengelolaan data, dan penulisan kode yang lebih baik.
    </p>
</section>

<section id="skills">
    <h2>Skills</h2>
    <div class="skills-container">
        <div class="skill">HTML</div>
        <div class="skill">CSS</div>
        <div class="skill">JavaScript</div>
        <div class="skill">PHP</div>
        <div class="skill">MySQL</div>
        <div class="skill">C++</div>
    </div>
</section>



<section id="contact" class="contact">
    <h2>Contact</h2>
    <p>Email: raditrakawar1@gmail.com</p>
    <p>GitHub: github.com/rakha-python</p>
    <p>Instagram: raditzzz01</p>

    <div class="hero-photo">
    <img src="{{ asset('img/foto-rakha.jpg') }}">
</div>
</section>

<footer>
    <p>© 2026 Raka. All Rights Reserved.</p>
</footer>

</body>
</html>


