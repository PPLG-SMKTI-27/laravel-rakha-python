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
    
    .brutal-shadow {
        box-shadow: 6px 6px 0px 0px #00ff41;
    }

    .brutal-shadow-pink {
        box-shadow: 6px 6px 0px 0px #ff006e;
    }

    /* Custom Focus untuk Input */
    .cyber-input:focus {
        border-color: #00ff41 !important;
        box-shadow: 0 0 10px rgba(0, 255, 65, 0.2);
        outline: none;
    }
</style>

<div class="min-h-screen cyber-bg flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 font-body">
    <div class="max-w-md w-full">
        
        <div class="bg-zinc-900 border-2 border-zinc-800 p-8 relative transition-all brutal-shadow-pink hover:border-pink-600">
            
            <div class="inline-block bg-pink-600 px-6 py-2 mb-8 transform -rotate-2 brutal-shadow">
                <h3 class="font-header text-2xl text-white uppercase italic tracking-tighter">
                    AUTH_LOGIN.EXE
                </h3>
            </div>

            @if ($errors->any())
                <div class="mb-6 bg-red-600 text-white p-4 text-xs uppercase font-bold brutal-shadow">
                    <p class="mb-2">⚠️ SYSTEM_ERROR_DETECTED:</p>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 bg-yellow-500 text-black p-4 text-xs uppercase font-bold brutal-shadow">
                    ⚠️ AUTH_FAILURE: {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label for="email" class="text-green-400 text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                        <span class="bg-green-400 text-black px-1">01</span> USER_EMAIL
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        class="cyber-input w-full bg-black border-2 border-zinc-800 p-3 text-white font-body transition-all"
                        placeholder="ENTER_EMAIL..."
                    >
                </div>

                <div class="space-y-2">
                    <label for="password" class="text-green-400 text-xs font-bold uppercase tracking-widest flex items-center gap-2">
                        <span class="bg-green-400 text-black px-1">02</span> ACCESS_KEY
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        class="cyber-input w-full bg-black border-2 border-zinc-800 p-3 text-white font-body transition-all"
                        placeholder="••••••••"
                    >
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-white text-black font-header py-4 text-xl uppercase tracking-tighter border-2 border-white hover:bg-green-400 hover:border-green-400 transition-all brutal-shadow active:translate-y-1 active:shadow-none">
                        EXECUTE_LOGIN.BAT
                    </button>
                </div>
            </form>

            <div class="mt-8 border-t border-zinc-800 pt-6">
                <div class="bg-zinc-800/50 p-3 border-l-4 border-green-400">
                    <p class="text-[10px] text-zinc-500 uppercase font-bold mb-1">// SYSTEM_CREDENTIALS_DEMO:</p>
                    <p class="text-[11px] text-green-400/70 font-mono">
                        UID: admin@sekolah.id<br>
                        PASS: 123456
                    </p>
                </div>
            </div>

            <div class="absolute -top-3 -right-2 text-[10px] text-zinc-700 font-bold uppercase bg-black px-2">
                SECURE_VOID_V.1
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="/" class="text-zinc-600 hover:text-pink-500 text-xs uppercase font-bold tracking-widest transition-colors">
                < RETURN_TO_HOME
            </a>
        </div>
    </div>
</div>
@endsection