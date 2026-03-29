@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&family=JetBrains+Mono:wght@400;700&family=Inter:wght@400;600&display=swap');

    :root {
        --bg: #0a0a0a;
        --panel: #111111;
        --accent: #22c55e;
        --border: #27272a;
    }

    body { 
        background-color: var(--bg);
        color: #e4e4e7;
        font-family: 'Inter', sans-serif;
    }

    /* Grid Background yang lebih subtle */
    .bg-grid {
        background-image: linear-gradient(to right, #161616 1px, transparent 1px),
                          linear-gradient(to bottom, #161616 1px, transparent 1px);
        background-size: 30px 30px;
    }

    .heavy-header { font-family: 'Archivo Black', sans-serif; text-transform: uppercase; }
    .mono { font-family: 'JetBrains Mono', monospace; }

    /* Container Utama */
    .brutal-container {
        border: 3px solid #000;
        background: var(--panel);
        box-shadow: 12px 12px 0px #000;
    }

    /* Styling Tabel yang Lebih Rapi */
    .brutal-table { width: 100%; border-collapse: collapse; }
    
    .brutal-table thead th {
        background: #000;
        color: var(--accent);
        font-family: 'JetBrains Mono', monospace;
        text-align: left;
        padding: 1rem;
        font-size: 0.7rem;
        letter-spacing: 0.1em;
        border-bottom: 3px solid var(--accent);
    }

    .brutal-table tbody tr {
        border-bottom: 1px solid var(--border);
        transition: background 0.2s;
    }

    .brutal-table tbody tr:hover { background: #161616; }

    .brutal-table td { padding: 1.25rem 1rem; vertical-align: middle; }

    /* Perbaikan Tombol Action (Biar nggak gede-gede) */
    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border: 2px solid #000;
        background: #fff;
        color: #000;
        transition: 0.1s;
        box-shadow: 3px 3px 0px #000;
    }

    .action-btn:hover {
        transform: translate(-2px, -2px);
        box-shadow: 5px 5px 0px #000;
    }

    .action-btn.edit:hover { background: #facc15; }
    .action-btn.delete:hover { background: #ef4444; color: #fff; }
    .action-btn.link { background: var(--accent); }

    /* Badge Teknologi */
    .tech-tag {
        font-family: 'JetBrains Mono', monospace;
        font-size: 9px;
        padding: 2px 6px;
        border: 1px solid var(--accent);
        color: var(--accent);
        background: rgba(34, 197, 94, 0.1);
        text-transform: uppercase;
    }

    /* Button Navigation */
    .nav-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 1rem 1.8rem;
        font-family: 'Archivo Black', sans-serif;
        text-transform: uppercase;
        font-size: 0.95rem;
        font-weight: 900;
        letter-spacing: 1px;
        border: 3px solid #000;
        box-shadow: 6px 6px 0px #000;
        transition: all 0.2s;
        cursor: pointer;
        text-decoration: none;
    }

    .nav-btn:hover {
        transform: translate(-3px, -3px);
        box-shadow: 9px 9px 0px #000;
    }

    .nav-btn:active { 
        transform: translate(3px, 3px); 
        box-shadow: 0px 0px 0px #000; 
    }

    /* Add Project Button - Lebih Menonjol */
    .btn-add-project {
        padding: 1rem 1.8rem;
        font-family: 'Archivo Black', sans-serif;
        text-transform: uppercase;
        font-size: 0.9rem;
        font-weight: 900;
        letter-spacing: 1px;
        border: 3px solid #000;
        background: var(--accent);
        color: #000;
        box-shadow: 6px 6px 0px #000;
        transition: all 0.2s;
        cursor: pointer;
    }

    .btn-add-project:hover {
        transform: translate(-3px, -3px);
        box-shadow: 9px 9px 0px #000;
        background: #4ade80;
    }

    .btn-add-project:active {
        transform: translate(3px, 3px);
        box-shadow: 0px 0px 0px #000;
    }
</style>

<div class="min-h-screen bg-grid py-12 px-6">
    <div class="max-w-7xl mx-auto">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-6">
            <div>
                <h1 class="heavy-header text-5xl text-white mb-2">PROJECTS<span class="text-accent">_LOG</span></h1>
                <p class="mono text-zinc-500 text-xs uppercase tracking-[0.2em]">System integrity: Active // Database linked</p>
            </div>
            <div class="flex gap-4">
                <a href="{{ route('dashboard') }}" class="nav-btn bg-white text-black hover:bg-zinc-200">
                    [ Back_to_Core ]
                </a>
                <a href="{{ route('dashboard.projects.create') }}" class="btn-add-project">
                    + ADD_NEW_PROJECT
                </a>
            </div>
        </div>

        <div class="brutal-container overflow-hidden">
            <div class="overflow-x-auto">
                <table class="brutal-table">
                    <thead>
                        <tr>
                            <th class="w-16 text-center">ID</th>
                            <th class="w-1/4">PROJECT_IDENTITY</th>
                            <th class="w-1/3">DESCRIPTION</th>
                            <th>TECH_STACK</th>
                            <th class="text-right">OPERATIONS</th>
                        </tr>
                    </thead>
                    <tbody class="mono text-sm">
                        @forelse ($projects as $project)
                        <tr>
                            <td class="text-center text-zinc-600 font-bold">#{{ $project->id }}</td>
                            <td>
                                <span class="heavy-header text-lg text-white group-hover:text-accent">
                                    {{ $project->judul_project }}
                                </span>
                            </td>
                            <td class="text-xs text-zinc-400 leading-relaxed">
                                {{ Str::limit($project->deskripsi, 90) }}
                            </td>
                            <td>
                                <div class="flex flex-wrap gap-1">
                                    @if($project->teknologi)
                                        @foreach($project->teknologi as $tech)
                                            <span class="tech-tag">{{ $tech }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </td>
                            <td class="text-right">
                                <div class="flex justify-end gap-3">
                                    @if($project->link_project)
                                        <a href="{{ $project->link_project }}" target="_blank" class="action-btn link" title="External Link">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                        </a>
                                    @endif
                                    
                                    <a href="{{ route('dashboard.projects.edit', $project->id) }}" class="action-btn edit" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('dashboard.projects.destroy', $project->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('PURGE DATA?')" class="action-btn delete" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-20 text-center text-zinc-700 italic">No records found in database.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-8 flex justify-between items-center mono text-[10px] text-zinc-700 uppercase tracking-widest">
            <span>Auth_User: {{ Auth::user()->name ?? 'Admin' }}</span>
            <span>v4.2.0-stable</span>
        </div>
    </div>
</div>
@endsection