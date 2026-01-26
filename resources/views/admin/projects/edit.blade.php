@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Header Card -->
            <div class="card mb-4" style="background: rgba(0,255,65,0.05); border: 1px solid var(--primary-glow); border-left: 5px solid var(--primary-glow);">
                <div class="card-body">
                    <h2 style="color: var(--primary-glow); margin: 0; text-transform: uppercase; letter-spacing: 2px;">✏️ Edit Project</h2>
                    <p style="color: #888; margin: 5px 0 0 0;">Update informasi project {{ $project->judul_project }}</p>
                </div>
            </div>

            <!-- Form -->
            <div class="card" style="background: rgba(0,255,65,0.02); border: 1px solid rgba(0,255,65,0.3);">
                <div class="card-body">
                    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Judul Project -->
                        <div class="mb-3">
                            <label for="judul_project" class="form-label" style="color: var(--primary-glow); font-weight: bold;">Judul Project</label>
                            <input 
                                type="text" 
                                class="form-control @error('judul_project') is-invalid @enderror" 
                                id="judul_project" 
                                name="judul_project" 
                                value="{{ old('judul_project', $project->judul_project) }}"
                                placeholder="Masukkan judul project"
                                required>
                            @error('judul_project')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label" style="color: var(--primary-glow); font-weight: bold;">Deskripsi</label>
                            <textarea 
                                class="form-control @error('deskripsi') is-invalid @enderror" 
                                id="deskripsi" 
                                name="deskripsi" 
                                rows="5"
                                placeholder="Jelaskan tentang project ini"
                                required>{{ old('deskripsi', $project->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Teknologi -->
                        <div class="mb-3">
                            <label for="teknologi" class="form-label" style="color: var(--primary-glow); font-weight: bold;">Teknologi (pisahkan dengan koma)</label>
                            <input 
                                type="text" 
                                class="form-control @error('teknologi') is-invalid @enderror" 
                                id="teknologi" 
                                name="teknologi" 
                                value="{{ old('teknologi', is_array($project->teknologi) ? implode(', ', $project->teknologi) : $project->teknologi) }}"
                                placeholder="Contoh: Laravel, Vue.js, MySQL"
                                required>
                            @error('teknologi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Link Project -->
                        <div class="mb-3">
                            <label for="link_project" class="form-label" style="color: var(--primary-glow); font-weight: bold;">Link Project (opsional)</label>
                            <input 
                                type="url" 
                                class="form-control @error('link_project') is-invalid @enderror" 
                                id="link_project" 
                                name="link_project" 
                                value="{{ old('link_project', $project->link_project) }}"
                                placeholder="https://project.com">
                            @error('link_project')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-warning">✏️ Update Project</button>
                            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
