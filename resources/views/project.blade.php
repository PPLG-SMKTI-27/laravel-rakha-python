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
    
    /* Effect Shadow Kotak (Neubrutalism) */
    .brutal-shadow {
        box-shadow: 4px 4px 0px 0px #00ff41;
    }
    
    .brutal-shadow-pink {
        box-shadow: 4px 4px 0px 0px #ff006e;
    }

    .neon-line {
        height: 2px;
        background: #00ff41;
        box-shadow: 0 0 10px #00ff41;
    }
</style>

<div class="min-h-screen cyber-bg py-12 px-4 sm:px-6 lg:px-8 font-body">
    <div class="max-w-6xl mx-auto">
        
        <div class="mb-12">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <h1 class="font-header text-6xl text-white uppercase tracking-tighter italic">
                        PROJECTS<span class="text-green-400">.DB</span>
                    </h1>
                    <div class="neon-line w-full mt-2"></div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-8 bg-green-400 text-black p-4 font-header uppercase tracking-tighter flex items-center gap-3">
                <span class="text-2xl">⚡</span>
                {{ session('success') }}
            </div>
        @endif

        @if (count($projects) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                @foreach ($projects as $project)
                    <div class="bg-zinc-900/50 border-2 border-zinc-800 p-6 relative group hover:border-green-400 transition-colors">
                        <div class="inline-block bg-pink-600 px-4 py-1 mb-4 transform -rotate-1 brutal-shadow">
                            <h3 class="font-header text-xl text-white uppercase">{{ $project['judul_project'] }}</h3>
                        </div>

                        <div class="text-zinc-400 mb-6 leading-relaxed">
                            <span class="text-green-400">// DESCRIPTION:</span><br>
                            {{ $project['deskripsi'] }}
                        </div>

                        <div class="bg-green-400 text-black px-3 py-1 mb-6 inline-flex flex-wrap gap-2 text-xs font-bold uppercase">
                            @foreach ($project['teknologi'] as $tech)
                                <span>{{ $tech }}</span>
                                @if(!$loop->last) <span>//</span> @endif
                            @endforeach
                        </div>

                        <div class="flex flex-wrap items-center justify-between gap-4 pt-4 border-t border-zinc-800">
                            @if ($project['link_project'])
                                <a href="{{ $project['link_project'] }}" target="_blank" class="text-green-400 hover:underline flex items-center gap-2">
                                    OPEN_LIVE_SOURCE ↗
                                </a>
                            @endif
                        </div>
                        
                        <div class="absolute -bottom-3 -right-2 text-[10px] text-zinc-700 uppercase">
                            TIMESTAMP: {{ $project['created_at'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 border-2 border-dashed border-zinc-800">
                <div class="font-header text-4xl text-zinc-800 mb-6 uppercase tracking-tighter">
                    NO_DATA_FOUND_IN_SYSTEM
                </div>
            </div>
        @endif

        <div class="mt-20 border-t-2 border-green-500 pt-6">
            <a href="{{ route('dashboard.index') }}" class="text-zinc-500 hover:text-white flex items-center gap-2 transition-colors">
                <span class="text-green-400"><</span> ESC_TO_DASHBOARD
            </a>
        </div>
    </div>
</div>
@endsection