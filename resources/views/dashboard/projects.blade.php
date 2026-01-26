@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@700&family=Syne:wght@800&family=JetBrains+Mono&display=swap');

    .cyber-bg {
        background-color: #000;
        background-image: radial-gradient(#333 1px, transparent 1px);
        background-size: 20px 20px;
    }

    .font-header { font-family: 'Syne', sans-serif; }
    .font-body { font-family: 'JetBrains Mono', monospace; }
    
    .brutal-shadow { box-shadow: 5px 5px 0px 0px #00ff41; }
    .brutal-shadow-pink { box-shadow: 5px 5px 0px 0px #ff006e; }

    .custom-scroll::-webkit-scrollbar { height: 4px; }
    .custom-scroll::-webkit-scrollbar-track { background: #111; }
    .custom-scroll::-webkit-scrollbar-thumb { background: #ff006e; }

    .cyber-table thead th {
        border-bottom: 2px solid #00ff41;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-size: 0.75rem;
    }
</style>

<div class="min-h-screen cyber-bg py-12 px-4 sm:px-6 lg:px-8 font-body">
    <div class="max-w-7xl mx-auto">
        
        <div class="mb-12 flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
            <div class="relative">
                <div class="inline-block bg-pink-600 px-6 py-2 mb-2 transform -rotate-1 brutal-shadow">
                    <h2 class="font-header text-3xl text-white uppercase italic tracking-tighter">
                        PROJECT_MANAGER.SYS
                    </h2>
                </div>
                <p class="text-zinc-500 text-xs tracking-widest uppercase italic">Modify, append, or purge project records from the database.</p>
            </div>
            
            <a href="{{ route('dashboard.projects.create') }}" 
               class="bg-white text-black font-header px-8 py-3 text-lg uppercase tracking-tighter border-2 border-white hover:bg-green-400 hover:border-green-400 transition-all brutal-shadow">
                + ADD_NEW_PROJECT.EXE
            </a>
        </div>

        @if (session('success'))
            <div class="mb-8 bg-green-400 text-black p-4 font-header uppercase tracking-tighter flex items-center gap-3 brutal-shadow">
                <span class="text-xl">⚡</span>
                STATUS_OK: {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-8 bg-red-600 text-white p-4 font-header uppercase tracking-tighter flex items-center gap-3 brutal-shadow">
                <span class="text-xl">⚠️</span>
                CRITICAL_ERROR: {{ session('error') }}
            </div>
        @endif

        @if (count($projects) > 0)
            <div class="bg-zinc-900 border-2 border-zinc-800 p-2 brutal-shadow-pink overflow-hidden">
                <div class="overflow-x-auto custom-scroll">
                    <table class="w-full text-left cyber-table border-collapse">
                        <thead class="bg-black">
                            <tr class="text-green-400">
                                <th class="p-4">UID</th>
                                <th class="p-4">PROJECT_TITLE</th>
                                <th class="p-4">DESCRIPTION_LOG</th>
                                <th class="p-4">TECH_STACK</th>
                                <th class="p-4 text-center">SOURCE</th>
                                <th class="p-4 text-right">OPERATIONS</th>
                            </tr>
                        </thead>
                        <tbody class="text-zinc-400">
                            @foreach ($projects as $project)
                                <tr class="border-b border-zinc-800/50 hover:bg-zinc-800/30 transition-colors group">
                                    <td class="p-4 font-bold text-zinc-600">#{{ $project->id }}</td>
                                    <td class="p-4 text-white font-header uppercase italic group-hover:text-green-400">
                                        {{ $project->judul_project }}
                                    </td>
                                    <td class="p-4 text-xs leading-relaxed max-w-xs">
                                        {{ Str::limit($project->deskripsi, 60) }}
                                    </td>
                                    <td class="p-4">
                                        <div class="flex flex-wrap gap-1">
                                            @if($project->teknologi)
                                                @foreach($project->teknologi as $tech)
                                                    <span class="px-2 py-0.5 bg-zinc-800 text-[10px] text-green-400 border border-zinc-700 font-mono">
                                                        {{ $tech }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>
                                    </td>
                                    <td class="p-4 text-center">
                                        @if($project->link_project)
                                            <a href="{{ $project->link_project }}" target="_blank" class="text-pink-500 hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                </svg>
                                            </a>
                                        @else
                                            <span class="text-zinc-800 italic text-[10px]">NULL</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-right">
                                        <div class="flex justify-end gap-3">
                                            <a href="{{ route('dashboard.projects.edit', $project->id) }}" 
                                               class="p-2 border border-zinc-700 hover:bg-white hover:text-black transition-all group/edit" 
                                               title="Edit Record">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('dashboard.projects.destroy', $project->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        onclick="return confirm('WARNING: PERMANENT DATA PURGE. PROCEED?')"
                                                        class="p-2 border border-zinc-700 hover:bg-red-600 hover:border-red-600 text-red-500 hover:text-white transition-all" 
                                                        title="Purge Record">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="text-center py-24 border-2 border-dashed border-zinc-800">
                <div class="font-header text-5xl text-zinc-800 mb-6 uppercase tracking-tighter italic">
                    ZERO_PROJECTS_LOCATED
                </div>
                <a href="{{ route('dashboard.projects.create') }}" 
                   class="inline-block bg-green-400 text-black font-header px-12 py-4 text-2xl uppercase tracking-tighter brutal-shadow">
                    INIT_DATABASE.EXE
                </a>
            </div>
        @endif

        <div class="mt-12">
            <a href="{{ route('dashboard.index') }}" class="text-zinc-600 hover:text-pink-500 text-xs uppercase font-bold tracking-widest transition-colors flex items-center gap-2">
                <span class="text-green-400"><</span> RETURN_TO_SYSTEM_CORE
            </a>
        </div>
    </div>
</div>
@endsection