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

    /* Custom Scrollbar untuk Tabel */
    .custom-scroll::-webkit-scrollbar { height: 4px; }
    .custom-scroll::-webkit-scrollbar-track { background: #111; }
    .custom-scroll::-webkit-scrollbar-thumb { background: #00ff41; }

    .nav-tab-active {
        background: #ff006e;
        color: white;
        box-shadow: 4px 4px 0px 0px #00ff41;
        transform: translateY(-2px);
    }
</style>

<div class="min-h-screen cyber-bg py-12 px-4 sm:px-6 lg:px-8 font-body">
    <div class="max-w-6xl mx-auto">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12 border-b-2 border-zinc-800 pb-8">
            <div>
                <div class="inline-block bg-pink-600 px-4 py-1 mb-2 brutal-shadow">
                    <h2 class="font-header text-2xl text-white uppercase italic tracking-tighter">⚡ SYSTEM_DASHBOARD</h2>
                </div>
                <p class="text-zinc-500 text-xs tracking-widest uppercase italic">Authorized Access Only // Welcome back, Operator.</p>
            </div>
            
            <div class="flex gap-4">
                <a href="{{ route('dashboard.projects') }}" class="bg-zinc-900 text-green-400 border border-green-400 px-4 py-2 text-xs font-bold uppercase hover:bg-green-400 hover:text-black transition-all">
                    MANAGE_PROJECTS.SYS
                </a>
                <form action="{{ route('dashboard.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-zinc-900 text-red-500 border border-red-500 px-4 py-2 text-xs font-bold uppercase hover:bg-red-500 hover:text-white transition-all">
                        SIGNOUT.SH
                    </button>
                </form>
            </div>
        </div>

        <div class="flex flex-wrap gap-4 mb-10">
            <button class="px-6 py-2 font-header text-sm uppercase tracking-tighter border-2 border-zinc-700 text-zinc-500 hover:border-pink-600 hover:text-white transition-all nav-tab-active">
                [01] BIO_DATA
            </button>
            <button class="px-6 py-2 font-header text-sm uppercase tracking-tighter border-2 border-zinc-700 text-zinc-500 hover:border-pink-600 hover:text-white transition-all">
                [02] PROJECTS_LIST
            </button>
            <button class="px-6 py-2 font-header text-sm uppercase tracking-tighter border-2 border-zinc-700 text-zinc-500 hover:border-pink-600 hover:text-white transition-all">
                [03] SKILLS_VOID
            </button>
        </div>

        @if (session('success'))
            <div class="mb-8 bg-green-400 text-black p-4 font-header uppercase tracking-tighter flex items-center gap-3 brutal-shadow">
                <span class="animate-pulse text-2xl">✔</span>
                SUCCESS: {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-zinc-900 border-2 border-zinc-800 p-8 brutal-shadow-pink relative">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="text-green-400">📝</span>
                        <h5 class="font-header text-white uppercase tracking-tighter">MODIFY_BIO_DATA</h5>
                    </div>

                    <form action="{{ route('dashboard.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-zinc-500 text-[10px] font-bold uppercase tracking-widest italic">USER_FULL_NAME</label>
                                <input type="text" name="nama" value="{{ old('nama', $portfolio['nama']) }}" 
                                    class="w-full bg-black border border-zinc-800 p-3 text-white text-sm focus:border-green-400 outline-none transition-all" required>
                            </div>
                            <div class="space-y-2">
                                <label class="text-zinc-500 text-[10px] font-bold uppercase tracking-widest italic">PROFESSION_TAG</label>
                                <input type="text" name="profesi" value="{{ old('profesi', $portfolio['profesi']) }}" 
                                    class="w-full bg-black border border-zinc-800 p-3 text-white text-sm focus:border-green-400 outline-none transition-all" required>
                            </div>
                            <div class="space-y-2">
                                <label class="text-zinc-500 text-[10px] font-bold uppercase tracking-widest italic">COMM_LINE_PHONE</label>
                                <input type="text" name="telepon" value="{{ old('telepon', $portfolio['telepon']) }}" 
                                    class="w-full bg-black border border-zinc-800 p-3 text-white text-sm focus:border-green-400 outline-none transition-all" required>
                            </div>
                            <div class="space-y-2">
                                <label class="text-zinc-500 text-[10px] font-bold uppercase tracking-widest italic">GEO_LOCATION</label>
                                <input type="text" name="lokasi" value="{{ old('lokasi', $portfolio['lokasi']) }}" 
                                    class="w-full bg-black border border-zinc-800 p-3 text-white text-sm focus:border-green-400 outline-none transition-all" required>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-zinc-500 text-[10px] font-bold uppercase tracking-widest italic">ABOUT_OPERATOR_LOG</label>
                            <textarea name="tentang" rows="4" 
                                class="w-full bg-black border border-zinc-800 p-3 text-white text-sm focus:border-green-400 outline-none transition-all" required>{{ old('tentang', $portfolio['tentang']) }}</textarea>
                        </div>

                        <button type="submit" class="bg-white text-black font-header px-8 py-3 uppercase border-2 border-white hover:bg-green-400 hover:border-green-400 transition-all brutal-shadow">
                            SAVE_CHANGES.EXE
                        </button>
                    </form>
                </div>

                <div class="bg-zinc-900 border-2 border-zinc-800 p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h5 class="font-header text-white uppercase tracking-tighter flex items-center gap-2">
                            <span class="text-pink-500">🚀</span> PROJECT_RECORDS
                        </h5>
                        <a href="{{ route('dashboard.projects.create') }}" class="text-[10px] font-bold text-green-400 uppercase tracking-widest hover:underline">
                            + CREATE_NEW_ENTRY
                        </a>
                    </div>
                    
                    <div class="overflow-x-auto custom-scroll">
                        <table class="w-full text-left text-xs uppercase font-bold">
                            <thead>
                                <tr class="text-zinc-600 border-b border-zinc-800">
                                    <th class="pb-3 px-2">PROJECT_NAME</th>
                                    <th class="pb-3 px-2">TECH_STACK</th>
                                    <th class="pb-3 px-2">STATUS</th>
                                    <th class="pb-3 px-2">ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="text-zinc-400">
                                <tr class="border-b border-zinc-800/50 hover:bg-zinc-800/30 transition-colors">
                                    <td class="py-4 px-2 text-white italic">Landing Page AI</td>
                                    <td class="py-4 px-2">
                                        <span class="bg-green-500/10 text-green-400 px-2 py-0.5 border border-green-400/30 font-mono italic">Laravel</span>
                                    </td>
                                    <td class="py-4 px-2 text-green-400 font-mono">LIVE_SRC</td>
                                    <td class="py-4 px-2 flex gap-2">
                                        <button class="text-zinc-500 hover:text-white transition-colors">✏️</button>
                                        <button class="text-zinc-500 hover:text-red-500 transition-colors">🗑️</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <div class="bg-zinc-900 border-2 border-zinc-800 p-6 brutal-shadow">
                    <h5 class="font-header text-white uppercase tracking-tighter mb-6 flex items-center gap-2">
                        <span class="text-green-400">🛠️</span> SKILL_ARRAY
                    </h5>
                    
                    <div class="space-y-4">
                        <div class="p-4 bg-black border border-zinc-800 border-l-4 border-l-green-400">
                            <h6 class="text-green-400 text-[10px] font-bold uppercase mb-1 tracking-widest italic">BACKEND_MODULE</h6>
                            <p class="text-zinc-500 text-xs">PHP, Laravel, MySQL, PostgreSQL</p>
                        </div>
                        <div class="p-4 bg-black border border-zinc-800 border-l-4 border-l-pink-600">
                            <h6 class="text-pink-600 text-[10px] font-bold uppercase mb-1 tracking-widest italic">FRONTEND_UI</h6>
                            <p class="text-zinc-500 text-xs">HTML5, Tailwind, JavaScript, React</p>
                        </div>
                    </div>
                </div>

                <div class="bg-black border border-zinc-800 p-4 font-mono text-[10px] text-zinc-600 space-y-1 italic">
                    <p>> initializing system_dashboard.bat...</p>
                    <p>> connection established...</p>
                    <p>> welcome back, rakha...</p>
                    <p>> current_session: stable</p>
                    <div class="animate-pulse">> _</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection