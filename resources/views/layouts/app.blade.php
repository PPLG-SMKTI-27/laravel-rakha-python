<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio | Rakha')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Bungee&family=Space+Mono:wght@400;700&family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-glow: #00ff41; 
            --secondary-glow: #ff0055; 
            --bg-dark: #0a0a0a;
            --concrete: #1a1a1a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-dark);
            background-image: 
                url('https://www.transparenttextures.com/patterns/asfalt-dark.png'),
                radial-gradient(circle at 2px 2px, rgba(255,255,255,0.03) 1px, transparent 0);
            background-size: auto, 40px 40px;
            color: #ffffff;
            line-height: 1.6;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: 0.3s;
        }

        /* --- UPDATED HEADER LOGIC --- */
        header {
            background: rgba(0, 0, 0, 0.95);
            padding: 20px 0;
            position: fixed; /* Ubah ke fixed agar top transition bekerja */
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            border-bottom: 4px solid var(--primary-glow);
            transform: skewY(-1deg);
            margin-top: -5px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            
            /* Transisi untuk efek sembunyi/tampil */
            transition: top 0.4s cubic-bezier(0.23, 1, 0.320, 1);
        }

        /* Class untuk menyembunyikan header */
        .header-hidden {
            top: -150px; /* Angka ini harus lebih besar dari tinggi header */
        }

        header nav {
            transform: skewY(1deg);
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        header h1 {
            font-family: 'Permanent Marker', cursive;
            color: var(--primary-glow);
            font-size: 32px;
            text-shadow: 3px 3px 0px var(--secondary-glow);
            letter-spacing: 3px;
            margin-bottom: 10px;
        }

        header nav ul {
            list-style: none;
            display: flex;
            gap: 30px;
            justify-content: center;
        }

        header nav a {
            font-family: 'Space Mono', monospace;
            font-weight: 700;
            text-transform: uppercase;
            padding: 5px 10px;
        }

        header nav a:hover {
            color: var(--bg-dark);
            background: var(--primary-glow);
            box-shadow: 4px 4px 0px var(--secondary-glow);
        }

        /* Beri padding top pada main agar konten tidak tertutup fixed header */
        main {
            min-height: calc(100vh - 150px);
            position: relative;
            padding-top: 120px; 
        }

        main::before {
            content: "";
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: url('https://www.transparenttextures.com/patterns/fake-brick.png');
            opacity: 0.05;
            pointer-events: none;
            z-index: 999;
        }

        footer {
            background: #000;
            padding: 40px 10%;
            text-align: center;
            border-top: 1px dashed var(--primary-glow);
            color: #666;
            font-family: 'Space Mono', monospace;
        }

        @yield('styles')
    </style>
</head>
<body>

@include('components.navbar')

<main>
    @yield('content')
</main>

@yield('footer')

<script>
    let lastScrollTop = 0;
    const header = document.querySelector('header');
    const scrollThreshold = 10; // Toleransi scroll dalam pixel

    window.addEventListener('scroll', () => {
        let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        // Cek jika scroll sudah melebihi threshold
        if (Math.abs(lastScrollTop - currentScroll) <= scrollThreshold) return;

        if (currentScroll > lastScrollTop && currentScroll > 100) {
            // Scroll Down - Sembunyikan
            header.classList.add('header-hidden');
        } else {
            // Scroll Up - Tampilkan
            header.classList.remove('header-hidden');
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; 
    }, { passive: true });
</script>

</body>
</html>