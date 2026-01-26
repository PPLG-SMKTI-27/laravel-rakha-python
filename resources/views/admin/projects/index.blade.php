@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Header Card -->
            <div class="card mb-4" style="background: rgba(0,255,65,0.05); border: 1px solid var(--primary-glow); border-left: 5px solid var(--primary-glow);">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 style="color: var(--primary-glow); margin: 0; text-transform: uppercase; letter-spacing: 2px;">⚙️ Kelola Projects</h2>
                            <p style="color: #888; margin: 5px 0 0 0;">Admin Panel - Tambah, Edit, Hapus Project</p>
                        </div>
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-success">
                            <span>+ Tambah Project</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <strong>✅ Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4">
                    <strong>❌ Error!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Projects Table -->
            @if (count($projects) > 0)
                <div class="card">
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
                                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
