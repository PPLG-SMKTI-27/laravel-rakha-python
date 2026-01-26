@extends('layouts.app')

@section(section: 'content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@700&family=Syne:wght@800&family=JetBrains+Mono&display=swap');

    .cyber-bg {
        background-color: #000;
        background-image: radial-gradient(#333 1px, transparent 1px);
        background-size: 20px 20px;
    }

    .font-header { font-family: 'Syne', sans-serif; }
    .font-body { font-family: 'JetBrains Mono', monospace; }
    
    .brutal-shadow { box-shadow: 6px 6px 0px 0px #00ff41; }
    .brutal-shadow-pink { box-shadow: 6px 6px 0px 0px #ff006e; }

    .cyber-input {
        background-color: #000 !important;
        border: 2px solid #27272a !important; /* zinc-800 */
        color: #fff !important;
        border-radius: 0 !important;
        transition: all 0.2s ease;
    }

    .cyber-input:focus {
        border-color: #ff006e !important; /* Pink focus untuk membedakan dengan Create */
        box-shadow: 0 0 15px rgba(255, 0, 110, 0.1) !important;
        outline: none;
    }

    .input-label {
        color: #ff006e; /* Pink label untuk mode Edit */
        font-size: 0.7rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
</style>

<div class="min-h-screen cyber-bg py-12 px-4 sm:px-6 lg:px-8 font-body">
    <div class="max-w-3xl mx-auto">
        
        <div class="mb-10 transform rotate-1">
            <div class="inline-block bg-white px-8 py-3 brutal-shadow-pink">
                <h2 class="font-header text-3xl text-black uppercase italic tracking-tighter m-0">
                    MODIFY_ENTRY_ID:{{ $project->id }}
                </h2>
            </div>
            <p class="text-zinc-500 text-xs mt-4 tracking-widest uppercase italic">
                // Current Target: <span class="text-green-400 font-bold">{{ $project->judul_project }}</span>
            </p>
        </div>

        <div class="bg-zinc-900 border-2 border-zinc-800 p-8 brutal-shadow relative">
            
            <form action="{{ route('dashboard.projects.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="judul_project" class="input-label">
                        <span class="bg-pink-600 text-white px-1 font-body">01</span> UPDATE_PROJECT_TITLE
                    </label>
                    <input 
                        type="text" 
                        class="cyber-input form-control @error('judul_project') is-invalid @enderror" 
                        id="judul_project" 
                        name="judul_project" 
                        value="{{ old('judul_project', $project->judul_project) }}"
                        required>
                    @error('judul_project')
                        <div class="text-red-500 text-[10px] mt-1 font-bold uppercase italic">>> ERR_INVALID_TITLE</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="deskripsi" class="input-label">
                        <span class="bg-pink-600 text-white px-1 font-body">02</span> REWRITE_DESCRIPTION_LOG
                    </label>
                    <textarea 
                        class="cyber-input form-control @error('deskripsi') is-invalid @enderror" 
                        id="deskripsi" 
                        name="deskripsi" 
                        rows="5"
                        required>{{ old('deskripsi', $project->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="text-red-500 text-[10px] mt-1 font-bold uppercase italic">>> ERR_DESCRIPTION_REQUIRED</div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="teknologi" class="input-label">
                        <span class="bg-pink-600 text-white px-1 font-body">03</span> PATCH_TECH_STACK_ARRAY
                    </label>
                    <input 
                        type="text" 
                        class="cyber-input form-control @error('teknologi') is-invalid @enderror" 
                        id="teknologi" 
                        name="teknologi" 
                        value="{{ old('teknologi', is_array($project->teknologi) ? implode(', ', $project->teknologi) : $project->teknologi) }}"
                        required>
                    @error('teknologi')
                        <div class="text-red-500 text-[10px] mt-1 font-bold uppercase italic">>> ERR_STACK_MISMATCH</div>
                    @enderror
                </div>

                <div class="mb-10">
                    <label for="link_project" class="input-label">
                        <span class="bg-pink-600 text-white px-1 font-body">04</span> TARGET_URL_REDIRECT
                    </label>
                    <input 
                        type="url" 
                        class="cyber-input form-control @error('link_project') is-invalid @enderror" 
                        id="link_project" 
                        name="link_project" 
                        value="{{ old('link_project', $project->link_project) }}">
                    @error('link_project')
                        <div class="text-red-500 text-[10px] mt-1 font-bold uppercase italic">>> ERR_URL_MALFORMED</div>
                    @enderror
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-zinc-800">
                    <button type="submit" class="bg-green-400 text-black font-header px-10 py-4 text-xl uppercase tracking-tighter border-2 border-green-400 hover:bg-white hover:border-white transition-all brutal-shadow">
                        EXECUTE_PATCH.EXE
                    </button>
                    
                    <a href="{{ route('dashboard.projects') }}" class="bg-zinc-900 text-zinc-500 font-header px-10 py-4 text-xl uppercase tracking-tighter border-2 border-zinc-800 hover:text-white hover:border-zinc-500 transition-all text-center">
                        ABORT_MISSION
                    </a>
                </div>
            </form>

            <div class="absolute -top-3 -right-2 text-[10px] text-zinc-700 font-bold uppercase bg-black px-2 italic">
                LAST_MODIFIED: {{ $project->updated_at->format('Y.m.d_H:i') }}
            </div>
        </div>

        <div class="mt-12">
            <a href="{{ route('dashboard.projects') }}" class="text-zinc-600 hover:text-green-400 text-xs uppercase font-bold tracking-widest transition-colors flex items-center gap-2">
                <span class="text-pink-500"><</span> ESC_TO_ROOT_DIR
            </a>
        </div>
    </div>
</div>
@endsection