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
    
    .brutal-shadow { box-shadow: 6px 6px 0px 0px #00ff41; }
    .brutal-shadow-pink { box-shadow: 6px 6px 0px 0px #ff006e; }

    /* Custom Input Styles */
    .cyber-input {
        background-color: #000 !important;
        border: 2px solid #27272a !important; /* zinc-800 */
        color: #fff !important;
        border-radius: 0 !important;
        transition: all 0.2s ease;
    }

    .cyber-input:focus {
        border-color: #00ff41 !important;
        box-shadow: 0 0 15px rgba(0, 255, 65, 0.1) !important;
        outline: none;
    }

    .cyber-input.is-invalid {
        border-color: #ef4444 !important; /* red-500 */
    }

    .input-label {
        color: #00ff41;
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
        
        <div class="mb-10 transform -rotate-1">
            <div class="inline-block bg-pink-600 px-8 py-3 brutal-shadow">
                <h2 class="font-header text-3xl text-white uppercase italic tracking-tighter m-0">
                    CREATE_NEW_ENTRY.SYS
                </h2>
            </div>
            <p class="text-zinc-500 text-xs mt-4 tracking-widest uppercase italic">
                // Warning: Ensure all data packets are valid before pushing to database.
            </p>
        </div>

        <div class="bg-zinc-900 border-2 border-zinc-800 p-8 brutal-shadow-pink relative">
            
            <form action="{{ route('dashboard.projects.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="judul_project" class="input-label">
                        <span class="bg-green-400 text-black px-1">01</span> PROJECT_NAME
                    </label>
                    <input 
                        type="text" 
                        class="cyber-input form-control @error('judul_project') is-invalid @enderror" 
                        id="judul_project" 
                        name="judul_project" 
                        value="{{ old('judul_project') }}"
                        placeholder="ENTER_NAME..."
                        required>
                    @error('judul_project')
                        <div class="text-red-500 text-[10px] mt-1 font-bold uppercase tracking-tighter italic">
                            >> ERROR_NULL_OR_INVALID_NAME: {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="deskripsi" class="input-label">
                        <span class="bg-green-400 text-black px-1">02</span> DESCRIPTION_LOG
                    </label>
                    <textarea 
                        class="cyber-input form-control @error('deskripsi') is-invalid @enderror" 
                        id="deskripsi" 
                        name="deskripsi" 
                        rows="5"
                        placeholder="INPUT_LOG_DETAILS..."
                        required>{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="text-red-500 text-[10px] mt-1 font-bold uppercase tracking-tighter italic">
                            >> ERROR_LOG_EMPTY: {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="teknologi" class="input-label">
                        <span class="bg-green-400 text-black px-1">03</span> TECH_STACK_ARRAY (USE_COMMA_SEPARATOR)
                    </label>
                    <input 
                        type="text" 
                        class="cyber-input form-control @error('teknologi') is-invalid @enderror" 
                        id="teknologi" 
                        name="teknologi" 
                        value="{{ old('teknologi') }}"
                        placeholder="PHP, LARAVEL, MYSQL..."
                        required>
                    @error('teknologi')
                        <div class="text-red-500 text-[10px] mt-1 font-bold uppercase tracking-tighter italic">
                            >> ERROR_STACK_UNDEFINED: {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-10">
                    <label for="link_project" class="input-label">
                        <span class="bg-green-400 text-black px-1">04</span> SOURCE_URL (OPTIONAL)
                    </label>
                    <input 
                        type="url" 
                        class="cyber-input form-control @error('link_project') is-invalid @enderror" 
                        id="link_project" 
                        name="link_project" 
                        value="{{ old('link_project') }}"
                        placeholder="HTTPS://REPOSITORY.COM/...">
                    @error('link_project')
                        <div class="text-red-500 text-[10px] mt-1 font-bold uppercase tracking-tighter italic">
                            >> ERROR_URL_CORRUPTED: {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-zinc-800">
                    <button type="submit" class="bg-white text-black font-header px-10 py-4 text-xl uppercase tracking-tighter border-2 border-white hover:bg-green-400 hover:border-green-400 transition-all brutal-shadow active:translate-y-1 active:shadow-none">
                        PUSH_TO_DATABASE.EXE
                    </button>
                    
                    <a href="{{ route('dashboard.projects') }}" class="bg-zinc-900 text-zinc-500 font-header px-10 py-4 text-xl uppercase tracking-tighter border-2 border-zinc-800 hover:text-white hover:border-zinc-500 transition-all text-center">
                        TERMINATE_PROCESS
                    </a>
                </div>
            </form>

            <div class="absolute -bottom-3 -left-2 text-[10px] text-zinc-700 font-bold uppercase bg-black px-2">
                UID: {{ Auth::id() ?? 'SESSION_01' }} // IP: {{ request()->ip() }}
            </div>
        </div>

        <div class="mt-12">
            <a href="{{ route('dashboard.projects') }}" class="text-zinc-600 hover:text-green-400 text-xs uppercase font-bold tracking-widest transition-colors flex items-center gap-2">
                <span class="text-pink-500"><</span> ESC_TO_PROJECT_MANAGER
            </a>
        </div>
    </div>
</div>
@endsection