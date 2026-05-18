@extends('layouts.app')

@section('title', 'Dashboard | Rakha')

@section('styles')
    @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Bungee&family=Space+Mono:wght@400;700&family=Poppins:wght@400;800&family=Space+Grotesk:wght@700&family=Syne:wght@800&display=swap');

    :root {
        --primary-glow: #00ff41;
        --secondary-glow: #ff0055;
        --bg-dark: #0a0a0a;
        --concrete: #1a1a1a;
    }

    .cyber-bg {
        background-color: var(--bg-dark);
        background-image: radial-gradient(#333 1px, transparent 1px);
        background-size: 20px 20px;
    }

    .font-header { font-family: 'Syne', sans-serif; }
    .font-body { font-family: 'Space Mono', monospace; }
    .font-graffiti { font-family: 'Permanent Marker', cursive; }

    .brutal-shadow {
        box-shadow: 4px 4px 0px 0px var(--primary-glow);
    }

    .brutal-shadow-pink {
        box-shadow: 4px 4px 0px 0px var(--secondary-glow);
    }

    .neon-line {
        height: 2px;
        background: var(--primary-glow);
        box-shadow: 0 0 10px var(--primary-glow);
    }

    .nav-item {
        display: block;
        padding: 12px 16px;
        background: transparent;
        border: 3px solid var(--primary-glow);
        color: var(--primary-glow);
        font-family: 'Space Mono', monospace;
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: 0.2s;
        text-decoration: none;
    }

    .nav-item:hover {
        background: var(--primary-glow);
        color: var(--bg-dark);
        transform: translate(-2px, -2px);
        box-shadow: 4px 4px 0px var(--secondary-glow);
    }

    .nav-item.secondary {
        border-color: var(--secondary-glow);
        color: var(--secondary-glow);
    }

    .nav-item.secondary:hover {
        background: var(--secondary-glow);
        color: var(--bg-dark);
        box-shadow: 4px 4px 0px var(--primary-glow);
    }

    .nav-item.tertiary {
        border-color: #facc15;
        color: #facc15;
    }

    .nav-item.tertiary:hover {
        background: #facc15;
        color: var(--bg-dark);
        box-shadow: 4px 4px 0px var(--primary-glow);
    }

    .status-box {
        background: var(--primary-glow);
        color: var(--bg-dark);
        padding: 16px;
        border: 3px solid var(--bg-dark);
        font-family: 'Space Mono', monospace;
        font-weight: 700;
        box-shadow: 4px 4px 0px var(--concrete);
    }

    .status-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .status-text {
        font-size: 0.95rem;
        line-height: 1.4;
    }

    .form-card {
        background: var(--concrete);
        border: 3px solid var(--primary-glow);
        padding: 32px;
        box-shadow: 6px 6px 0px rgba(0, 255, 65, 0.2);
    }

    .form-header {
        border-bottom: 3px solid var(--primary-glow);
        padding-bottom: 16px;
        margin-bottom: 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .form-title {
        font-family: 'Syne', sans-serif;
        font-size: 2rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--primary-glow);
    }

    .form-label {
        font-family: 'Space Mono', monospace;
        color: var(--primary-glow);
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
        display: block;
    }

    .form-input,
    .form-textarea {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid var(--primary-glow);
        background: var(--bg-dark);
        color: #fff;
        font-family: 'Space Mono', monospace;
        font-weight: 600;
        transition: 0.2s;
    }

    .form-input:focus,
    .form-textarea:focus {
        outline: none;
        border-color: var(--secondary-glow);
        background: rgba(0, 255, 65, 0.05);
        box-shadow: inset 0 0 10px rgba(0, 255, 65, 0.1);
    }

    .form-textarea {
        resize: none;
        font-size: 0.95rem;
        line-height: 1.5;
    }

    .success-banner {
        background: var(--primary-glow);
        color: var(--bg-dark);
        padding: 20px 24px;
        margin-bottom: 24px;
        border: 3px solid var(--bg-dark);
        font-family: 'Space Mono', monospace;
        font-weight: 700;
        text-transform: uppercase;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 4px 4px 0px var(--concrete);
    }

    .submit-btn {
        background: var(--primary-glow);
        color: var(--bg-dark);
        padding: 14px 28px;
        border: 3px solid var(--bg-dark);
        font-family: 'Space Mono', monospace;
        font-weight: 800;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: 0.2s;
        box-shadow: 4px 4px 0px var(--concrete);
    }

    .submit-btn:hover {
        background: var(--secondary-glow);
        transform: translate(-2px, -2px);
        box-shadow: 6px 6px 0px var(--concrete);
    }

    .error-text {
        color: var(--secondary-glow);
        font-size: 0.85rem;
        font-family: 'Space Mono', monospace;
        margin-top: 4px;
        text-transform: uppercase;
    }

    .warning-text {
        color: var(--secondary-glow);
        font-family: 'Space Mono', monospace;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .footer-info {
        margin-top: 32px;
        padding-top: 24px;
        border-top: 2px dashed var(--primary-glow);
        display: flex;
        justify-content: space-between;
        font-size: 0.75rem;
        color: var(--secondary-glow);
        font-family: 'Space Mono', monospace;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .sidebar-title {
        font-family: 'Permanent Marker', cursive;
        font-size: 2.5rem;
        color: var(--primary-glow);
        text-shadow: 4px 4px 0px var(--secondary-glow);
        letter-spacing: 1px;
        margin-bottom: 24px;
        line-height: 1.1;
    }

    @media (max-width: 768px) {
        .sidebar-title {
            font-size: 2rem;
        }

        .form-card {
            padding: 20px;
        }

        .form-title {
            font-size: 1.5rem;
        }

        .nav-item {
            padding: 10px 12px;
            font-size: 0.85rem;
        }

        .footer-info {
            flex-direction: column;
            gap: 8px;
            text-align: center;
        }
    }
@endsection

@section('content')
<div class="min-h-screen cyber-bg font-body text-white py-8 px-4 md:px-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6 md:gap-8">
        
        <!-- SIDEBAR -->
        <aside class="md:col-span-1">
            <div class="sticky top-24">
                <!-- Title -->
                <div class="mb-8">
                    <h1 class="sidebar-title">
                        USER<br><span class="text-pink-500">_CTRL</span>
                    </h1>
                </div>

                <!-- Navigation -->
                <nav class="space-y-4 mb-8">
                    <a href="#" class="nav-item">
                        01 // PROFILE
                    </a>
                    <a href="{{ route('dashboard.projects') }}" class="nav-item secondary">
                        02 // PROJECTS
                    </a>
                    <a href="{{ route('dashboard.skills') }}" class="nav-item tertiary">
                        03 // SKILLS
                    </a>
                </nav>

                <!-- System Status Box -->
                <div class="status-box">
                    <div class="status-label">System Status</div>
                    <div class="status-text">
                        ACTIVE<br/>
                        Connection: OK<br/>
                        Uptime: 99.8%
                    </div>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="md:col-span-3">
            <!-- Success Message -->
            @if (session('success'))
                <div class="success-banner">
                    <span>[OK] Profile updated successfully</span>
                    <span>→</span>
                </div>
            @endif

            <!-- Edit Form -->
            <div class="form-card">
                <!-- Header -->
                <div class="form-header">
                    <h2 class="form-title">EDIT_BIO</h2>
                    <span class="warning-text">Sys: OPERATOR_01</span>
                </div>

                <!-- Form -->
                <form action="{{ route('dashboard.update') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name and Role Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="form-label">Full Name</label>
                            <input 
                                type="text" 
                                name="nama" 
                                value="{{ old('nama', $portfolio['nama']) }}" 
                                class="form-input"
                                required
                            >
                            @error('nama')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Current Role</label>
                            <input 
                                type="text" 
                                name="profesi" 
                                value="{{ old('profesi', $portfolio['profesi']) }}" 
                                class="form-input"
                                required
                            >
                            @error('profesi')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Contact and Location Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="form-label">Contact</label>
                            <input 
                                type="text" 
                                name="telepon" 
                                value="{{ old('telepon', $portfolio['telepon']) }}" 
                                class="form-input"
                                required
                            >
                            @error('telepon')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Location</label>
                            <input 
                                type="text" 
                                name="lokasi" 
                                value="{{ old('lokasi', $portfolio['lokasi']) }}" 
                                class="form-input"
                                required
                            >
                            @error('lokasi')
                                <span class="error-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Biography -->
                    <div>
                        <label class="form-label">Biography</label>
                        <textarea 
                            name="tentang" 
                            rows="6" 
                            class="form-textarea"
                            required
                        >{{ old('tentang', $portfolio['tentang']) }}</textarea>
                        @error('tentang')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Section -->
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-4 pt-6 border-t-2 border-dashed border-primary-glow">
                        <button type="submit" class="submit-btn">
                            EXECUTE_COMMIT →
                        </button>
                        <span class="warning-text">Overwriting is tracked and permanent</span>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="footer-info">
                <span>SYS_LOG // v4.0.1</span>
                <span>STATUS: ONLINE</span>
                <span>2026 GRAVITY_UI</span>
            </div>
        </main>
    </div>
</div>

@endsection
