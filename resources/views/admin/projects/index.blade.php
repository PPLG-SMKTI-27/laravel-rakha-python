@extends('layouts.app')

@section('content')
<div class="container-fluid mt-3 mt-md-5 px-3 px-md-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Header Card -->
            <div class="card mb-4" style="background: rgba(0,255,65,0.05); border: 1px solid var(--primary-glow); border-left: 5px solid var(--primary-glow);">
                <div class="card-body p-3 p-md-4">
                    <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-start align-items-md-center gap-3">
                        <div>
                            <h2 style="color: var(--primary-glow); margin: 0; text-transform: uppercase; letter-spacing: 2px; font-size: 1.5rem;" class="d-md-h2">⚙️ Kelola Projects</h2>
                            <p style="color: #888; margin: 5px 0 0 0; font-size: 0.9rem;">Admin Panel - Tambah, Edit, Hapus Project</p>
                        </div>
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-success btn-sm w-100 w-md-auto">
                            <span>+ Tambah Project</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <strong>✅ Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <strong>❌ Error!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Projects Table - Desktop View -->
            @if (count($projects) > 0)
                <!-- Desktop Table (Hidden on Mobile) -->
                <div class="card d-none d-lg-block">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead style="background: rgba(0,255,65,0.1);">
                                <tr>
                                    <th style="color: var(--primary-glow);">ID</th>
                                    <th style="color: var(--primary-glow);">Judul Project</th>
                                    <th style="color: var(--primary-glow);">Deskripsi</th>
                                    <th style="color: var(--primary-glow);">Teknologi</th>
                                    <th style="color: var(--primary-glow);">Link</th>
                                    <th style="color: var(--primary-glow);">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td><strong>#{{ $project->id }}</strong></td>
                                        <td>{{ $project->judul_project }}</td>
                                        <td>{{ Str::limit($project->deskripsi, 50) }}</td>
                                        <td>
                                            @if($project->teknologi)
                                                @foreach($project->teknologi as $tech)
                                                    <span class="badge bg-success" style="background: rgba(0,255,65,0.3) !important; color: var(--primary-glow) !important;">{{ $tech }}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if($project->link_project)
                                                <a href="{{ $project->link_project }}" target="_blank" class="btn btn-sm btn-outline-primary">Buka</a>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Mobile Card View (Visible only on Mobile) -->
                <div class="d-lg-none">
                    @foreach ($projects as $project)
                        <div class="card mb-3" style="background: rgba(0,255,65,0.02); border: 1px solid rgba(0,255,65,0.3);">
                            <div class="card-body p-3">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0" style="color: var(--primary-glow);">{{ $project->judul_project }}</h5>
                                    <span class="badge bg-secondary">#{{ $project->id }}</span>
                                </div>
                                
                                <p class="card-text text-muted small mb-2">{{ Str::limit($project->deskripsi, 80) }}</p>
                                
                                <div class="mb-2">
                                    @if($project->teknologi)
                                        @foreach($project->teknologi as $tech)
                                            <span class="badge" style="background: rgba(0,255,65,0.3) !important; color: var(--primary-glow) !important; font-size: 0.75rem;">{{ $tech }}</span>
                                        @endforeach
                                    @endif
                                </div>
                                
                                <div class="d-flex gap-2 flex-wrap">
                                    @if($project->link_project)
                                        <a href="{{ $project->link_project }}" target="_blank" class="btn btn-sm btn-outline-primary">Buka</a>
                                    @endif
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info text-center">
                    <strong>📭 Belum ada project.</strong> <a href="{{ route('admin.projects.create') }}">Tambah project sekarang</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
