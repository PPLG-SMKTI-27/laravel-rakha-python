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
</style>

<div class="min-h-screen cyber-bg py-12 px-4 sm:px-6 lg:px-8 font-body">
    <div class="max-w-6xl mx-auto">

        {{-- HEADER --}}
        <div class="mb-12">
            <h1 class="font-header text-6xl text-white uppercase tracking-tighter italic">
                PROJECTS<span class="text-green-400">.DB</span>
            </h1>
            <div class="neon-line w-full mt-2"></div>
        </div>

        {{-- PROJECT SECTION --}}
        @if ($projects->isEmpty())
            <div class="text-center py-20 border-2 border-dashed border-zinc-800 mb-24">
                <div class="font-header text-4xl text-zinc-800 uppercase tracking-tighter">
                    NO_PROJECT_DATA_FOUND
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-24">
                @foreach ($projects as $project)
                    <div class="bg-zinc-900/50 border-2 border-zinc-800 p-6 relative hover:border-green-400 transition-colors">
                        <div class="inline-block bg-pink-600 px-4 py-1 mb-4 -rotate-1 brutal-shadow">
                            <h3 class="font-header text-xl text-white uppercase">
                                {{ $project->judul_project }}
                            </h3>
                        </div>

                        <div class="text-zinc-400 mb-6 leading-relaxed">
                            <span class="text-green-400">// DESCRIPTION:</span><br>
                            {{ $project->deskripsi }}
                        </div>

                        <div class="bg-green-400 text-black px-3 py-1 mb-6 inline-flex flex-wrap gap-2 text-xs font-bold uppercase">
                            @foreach ($project->teknologi as $tech)
                                <span>{{ $tech }}</span>
                                @if (!$loop->last) <span>//</span> @endif
                            @endforeach
                        </div>

                        @if ($project->link_project)
                            <a href="{{ $project->link_project }}" target="_blank"
                               class="text-green-400 hover:underline">
                                OPEN_LIVE_SOURCE ↗
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

      
        </div>

        {{-- BACK --}}
        <div class="border-t-2 border-green-500 pt-6">
            <a href="{{ url('/') }}"
               class="text-zinc-500 hover:text-white transition-colors">
                <span class="text-green-400"><</span> ESC_TO_HOME
            </a>
        </div>

    </div>
</div>
@endsection
