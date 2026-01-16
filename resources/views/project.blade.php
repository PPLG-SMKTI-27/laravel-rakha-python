<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Projects | Rakha</title>

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
            min-height: 100vh;
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

        header {
            background: rgba(2, 6, 23, 0.95);
            padding: 30px 10%;
            position: relative;
            z-index: 1;
            border-bottom: 2px solid rgba(0, 255, 200, 0.3);
            box-shadow: 0 0 20px rgba(0, 255, 200, 0.1);
            backdrop-filter: blur(10px);
        }

        header h1 {
            color: #00ffc8;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 2px;
            animation: glowPulse 2s ease-in-out infinite;
            text-shadow: 0 0 10px rgba(0, 255, 200, 0.5);
        }

        @keyframes glowPulse {
            0%, 100% {
                text-shadow: 0 0 10px rgba(0, 255, 200, 0.5), 0 0 20px rgba(0, 255, 200, 0.3);
            }
            50% {
                text-shadow: 0 0 20px rgba(0, 255, 200, 0.8), 0 0 30px rgba(0, 255, 200, 0.5);
            }
        }

        .container {
            padding: 60px 10%;
            position: relative;
            z-index: 1;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 50px;
            font-size: 36px;
            font-weight: 700;
            position: relative;
            display: inline-block;
            width: 100%;
            animation: slideInDown 0.8s ease;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container h2::before {
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

        .container h2 {
            background: linear-gradient(135deg, #00ffc8, #ff00aa, #0088ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .intro-text {
            text-align: center;
            color: #cbd5f5;
            margin-bottom: 30px;
            font-size: 16px;
            animation: fadeInUp 0.8s ease 0.2s both;
        }

        .intro-text strong {
            color: #00ffc8;
            font-weight: 600;
            text-shadow: 0 0 10px rgba(0, 255, 200, 0.3);
        }

        .projects {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .project-card {
            background: linear-gradient(135deg, rgba(0, 255, 200, 0.05), rgba(255, 0, 150, 0.05));
            padding: 30px;
            border-radius: 16px;
            border: 2px solid rgba(0, 255, 200, 0.2);
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease both;
            box-shadow: 0 0 20px rgba(0, 255, 200, 0.1);
        }

        .project-card:nth-child(1) { animation-delay: 0.2s; }
        .project-card:nth-child(2) { animation-delay: 0.4s; }
        .project-card:nth-child(3) { animation-delay: 0.6s; }

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
            margin-bottom: 12px;
            font-size: 18px;
            font-weight: 600;
            position: relative;
            z-index: 1;
            text-shadow: 0 0 10px rgba(0, 255, 200, 0.3);
        }

        .project-card p {
            color: #cbd5f5;
            font-size: 14px;
            line-height: 1.6;
            position: relative;
            z-index: 1;
        }

        .back {
            text-align: center;
            margin-top: 50px;
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            animation: fadeInUp 0.8s ease 0.8s both;
        }

        .back a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, #00ffc8 0%, #00dd88 100%);
            color: #0a0e27;
            padding: 14px 30px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            cursor: pointer;
            font-size: 14px;
            box-shadow: 0 0 20px rgba(0, 255, 200, 0.4);
            overflow: hidden;
            position: relative;
        }

        .back a::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
            z-index: -1;
        }

        .back a:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 255, 200, 0.6), 0 0 40px rgba(0, 255, 200, 0.3);
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .back a:hover::after {
            left: 100%;
        }

        .back a.github {
            background: rgba(31, 41, 55, 0.8);
            color: #00ffc8;
            border: 2px solid #00ffc8;
            box-shadow: 0 0 15px rgba(0, 255, 200, 0.2);
        }

        .back a.github:hover {
            background: linear-gradient(135deg, #00ffc8 0%, #00dd88 100%);
            color: #0a0e27;
            border-color: #00dd88;
            box-shadow: 0 10px 30px rgba(0, 255, 200, 0.6), 0 0 40px rgba(0, 255, 200, 0.3);
        }

        @media (max-width: 768px) {
            .container h2 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>RakhaWardhana.</h1>
</header>

<div class="container">
    <h2>My Projects</h2>

    <p class="intro-text">Halo, saya <strong>{{ $name ?? 'Nama' }}</strong></p>

    <div class="projects">
        <div class="project-card">
            <h3>CRUD App</h3>
            <p>Aplikasi CRUD sederhana menggunakan Laravel & MySQL.</p>
        </div>

        <div class="project-card">
            <h3>Portfolio Website</h3>
            <p>Website portofolio personal dengan HTML, CSS, dan Laravel.</p>
        </div>

        <div class="project-card">
            <h3>Audio Plugin Concept</h3>
            <p>Konsep plugin audio DSP untuk music production.</p>
        </div>
    </div>

    <div class="back">
        <a href="https://github.com/rakha-python" target="_blank" rel="noopener noreferrer" class="github">🔗 GitHub</a>
        <a href="/">← Kembali ke Home</a>
    </div>
</div>

</body>
</html>
