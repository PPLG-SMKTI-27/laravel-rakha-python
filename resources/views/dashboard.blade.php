@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Welcome Card -->
            <div class="card mb-4" style="background: rgba(0,255,65,0.05); border: 1px solid var(--primary-glow); border-left: 5px solid var(--primary-glow);">
                <div class="card-body">
                    <h2 style="color: var(--primary-glow); margin: 0; text-transform: uppercase; letter-spacing: 2px;">👋 Selamat Datang di Dashboard Admin</h2>
                    <p style="color: #888; margin: 5px 0 0 0;">Kelola portfolio project Anda dari sini</p>
                </div>
            </div>

            <!-- Menu Grid -->
            <div class="row">
                <!-- Projects Menu -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100" style="background: rgba(0,255,65,0.02); border: 1px solid rgba(0,255,65,0.3);">
                        <div class="card-header" style="background: rgba(0,255,65,0.1); border-bottom: 1px solid var(--primary-glow);">
                            <h5 style="color: var(--primary-glow); margin: 0;">⚙️ Kelola Projects</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Tambah, edit, dan hapus project dari portfolio Anda.</p>
                            <div class="d-flex gap-2">
                                <a href="{{ route('dashboard.projects') }}" class="btn btn-success">
                                    Kelola Projects →
                                </a>
                                <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">
                                    + Tambah Project
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Menu -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100" style="background: rgba(0,255,65,0.02); border: 1px solid rgba(0,255,65,0.3);">
                        <div class="card-header" style="background: rgba(0,255,65,0.1); border-bottom: 1px solid var(--primary-glow);">
                            <h5 style="color: var(--primary-glow); margin: 0;">👤 Profil</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Edit informasi profil Anda di sini.</p>
                            <a href="{{ route('dashboard.index') }}" class="btn btn-primary">
                                Edit Profil →
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logout Button -->
            <div class="mt-4">
                <form action="{{ route('dashboard.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">🚪 Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
