@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background: rgba(0,255,65,0.02); border: 1px solid var(--primary-glow);">
                <div class="card-header" style="background: rgba(0,255,65,0.1); border-bottom: 1px solid var(--primary-glow);">
                    <h3 style="color: var(--primary-glow); margin: 0;">🚀 Create New Project</h3>
                </div>

                <div class="card-body">
                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>❌ Validation Error!</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Create Project Form -->
                    <form action="{{ route('projects.store') }}" method="POST">
                        @csrf

                        <!-- Judul Project -->
                        <div class="mb-3">
                            <label for="judul_project" class="form-label" style="color: var(--primary-glow);">
                                <strong>Judul Project</strong>
                            </label>
                            <input 
                                type="text" 
                                id="judul_project"
                                name="judul_project" 
                                class="form-control @error('judul_project') is-invalid @enderror"
                                value="{{ old('judul_project') }}"
                                placeholder="Masukkan judul project"
                                required
                            >
                            @error('judul_project')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label" style="color: var(--primary-glow);">
                                <strong>Deskripsi</strong>
                            </label>
                            <textarea 
                                id="deskripsi"
                                name="deskripsi" 
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                rows="4"
                                placeholder="Jelaskan project Anda"
                                required
                            >{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Teknologi -->
                        <div class="mb-3">
                            <label for="teknologi" class="form-label" style="color: var(--primary-glow);">
                                <strong>Teknologi (pisahkan dengan koma)</strong>
                            </label>
                            <input 
                                type="text" 
                                id="teknologi"
                                name="teknologi" 
                                class="form-control @error('teknologi') is-invalid @enderror"
                                value="{{ old('teknologi') }}"
                                placeholder="Contoh: Laravel, MySQL, Bootstrap"
                                required
                            >
                            <small class="text-muted d-block mt-1">Contoh: Laravel, MySQL, Bootstrap</small>
                            @error('teknologi')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Link Project (Optional) -->
                        <div class="mb-3">
                            <label for="link_project" class="form-label" style="color: var(--primary-glow);">
                                <strong>Link Project (Optional)</strong>
                            </label>
                            <input 
                                type="url" 
                                id="link_project"
                                name="link_project" 
                                class="form-control @error('link_project') is-invalid @enderror"
                                value="{{ old('link_project') }}"
                                placeholder="https://example.com"
                            >
                            @error('link_project')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                💾 Save Project
                            </button>
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                                ❌ Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
