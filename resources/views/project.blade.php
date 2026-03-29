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

    @media (max-width: 640px) {
        .font-header {
            font-size: 1.75rem !important;
            line-height: 1.2;
        }
    }

    @media (max-width: 480px) {
        .py-12 { padding-top: 1rem !important; padding-bottom: 1rem !important; }
        .mb-12 { margin-bottom: 1.5rem !important; }
        .mb-24 { margin-bottom: 1.5rem !important; }
        .pt-6 { padding-top: 1rem !important; }
    }
</style>

<div class="min-h-screen cyber-bg py-6 md:py-12 px-3 md:px-4 lg:px-8 font-body">
    <div class="max-w-6xl mx-auto w-full">

        {{-- HEADER --}}
        <div class="mb-6 md:mb-12">
            <h1 class="font-header text-3xl md:text-4xl lg:text-6xl text-white uppercase tracking-tighter italic leading-tight">
                PROJECTS<span class="text-green-400">.DB</span>
            </h1>
            <div class="neon-line w-full mt-2 md:mt-3"></div>
        </div>

        {{-- PROJECT SECTION --}}
        @if ($projects->isEmpty())
            <div class="text-center py-12 md:py-20 border-2 border-dashed border-zinc-800 mb-12 md:mb-24">
                <div class="font-header text-2xl md:text-4xl text-zinc-800 uppercase tracking-tighter px-2">
                    NO_PROJECT_DATA_FOUND
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 md:gap-6 lg:gap-10 mb-12 md:mb-24 w-full">
                @foreach ($projects as $project)
                    <div class="bg-zinc-900/50 border-2 border-zinc-800 p-3 md:p-4 lg:p-6 relative hover:border-green-400 transition-colors">
                        <div class="inline-block bg-pink-600 px-3 py-1 mb-3 md:mb-4 -rotate-1 brutal-shadow text-sm md:text-base">
                            <h3 class="font-header text-base md:text-lg lg:text-xl text-white uppercase">
                                {{ $project->judul_project }}
                            </h3>
                        </div>

                        <div class="text-zinc-400 mb-4 md:mb-6 leading-relaxed text-sm md:text-base">
                            <span class="text-green-400">// DESCRIPTION:</span><br>
                            {{ $project->deskripsi }}
                        </div>

                        <div class="bg-green-400 text-black px-2 md:px-3 py-1 mb-3 md:mb-4 inline-flex flex-wrap gap-1 md:gap-2 text-xs font-bold uppercase">
                            @foreach ($project->teknologi as $tech)
                                <span>{{ $tech }}</span>
                                @if (!$loop->last) <span class="hidden md:inline">//</span> @endif
                            @endforeach
                        </div>

                        @if ($project->link_project)
                            <a href="{{ $project->link_project }}" target="_blank"
                               class="text-green-400 hover:underline text-sm md:text-base break-all">
                                OPEN_LIVE_SOURCE ↗
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

        {{-- BACK --}}
        <div class="border-t-2 border-green-500 pt-4 md:pt-6">
            <a href="{{ url('/') }}"
               class="text-zinc-500 hover:text-white transition-colors text-sm md:text-base inline-block">
                <span class="text-green-400"><</span> ESC_TO_HOME
            </a>
        </div>

    </div>
</div>
@endsection
