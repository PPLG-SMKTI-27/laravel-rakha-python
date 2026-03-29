@extends('layouts.app')

@section('title', 'Dashboard | Rakha')

@section('content')
<div class="min-h-screen bg-neutral-900 text-white font-mono">
    <!-- MAIN CONTAINER -->
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 py-12 px-4">
        <!-- SIDEBAR -->
        <aside class="md:col-span-1">
            <div class="sticky top-24">
                <!-- Title -->
                <h1 class="text-5xl font-black uppercase mb-8 text-green-400 drop-shadow-[3px_3px_0px_#ff0055]">
                    USER<br><span class="text-pink-500">_CTRL</span>
                </h1>

                <!-- Navigation Links -->
                <nav class="flex flex-col gap-4 mb-8">
                    <a href="#" class="block px-4 py-3 bg-neutral-800 border-2 border-green-400 text-green-400 font-bold hover:bg-green-400 hover:text-neutral-900 transition">
                        01 // PROFILE_DATA
                    </a>
                    <a href="{{ route('dashboard.projects') }}" class="block px-4 py-3 bg-neutral-800 border-2 border-pink-500 text-pink-400 font-bold hover:bg-pink-400 hover:text-neutral-900 transition">
                        02 // PROJECT_INDEX
                    </a>
                    <a href="{{ route('dashboard.skills') }}" class="block px-4 py-3 bg-neutral-800 border-2 border-yellow-400 text-yellow-400 font-bold hover:bg-yellow-400 hover:text-neutral-900 transition">
                        03 // SKILL_MODULES
                    </a>
                </nav>

                <!-- System Status Box -->
                <div class="bg-green-400 text-neutral-900 font-bold p-4 shadow-lg border-2 border-neutral-900">
                    <div class="uppercase text-xs mb-2">System Integrity</div>
                    <div class="text-sm">All sectors operational.<br>Database uplink stable at 120ms.</div>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="md:col-span-3">
            @if (session('success'))
                <div class="bg-green-400 text-neutral-900 font-bold p-6 mb-8 border-2 border-neutral-900 shadow-lg flex items-center justify-between">
                    <span class="text-xl uppercase">✓ Success! Data Overwritten.</span>
                    <span class="text-2xl">→</span>
                </div>
            @endif

            <!-- Edit Form Card -->
            <div class="bg-neutral-800 border-2 border-green-400 p-8 shadow-lg">
                <!-- Header -->
                <div class="flex items-center justify-between mb-8 pb-6 border-b-2 border-green-400">
                    <h2 class="text-4xl font-black uppercase text-green-400">Edit_Bio</h2>
                    <span class="text-xs text-pink-400 font-bold uppercase">Auth_Level: Operator_01</span>
                </div>

                <!-- Form -->
                <form action="{{ route('dashboard.update') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name and Role Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-green-400 font-bold mb-2 uppercase text-sm">Full Name</label>
                            <input type="text" name="nama" value="{{ old('nama', $portfolio['nama']) }}" class="w-full px-4 py-3 border-2 border-green-400 bg-neutral-900 text-white font-bold focus:outline-none focus:border-pink-400 focus:bg-neutral-700 transition" required>
                            @error('nama')
                                <span class="text-pink-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-green-400 font-bold mb-2 uppercase text-sm">Current Role</label>
                            <input type="text" name="profesi" value="{{ old('profesi', $portfolio['profesi']) }}" class="w-full px-4 py-3 border-2 border-green-400 bg-neutral-900 text-white font-bold focus:outline-none focus:border-pink-400 focus:bg-neutral-700 transition" required>
                            @error('profesi')
                                <span class="text-pink-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Phone and Location Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-green-400 font-bold mb-2 uppercase text-sm">Contact Uplink</label>
                            <input type="text" name="telepon" value="{{ old('telepon', $portfolio['telepon']) }}" class="w-full px-4 py-3 border-2 border-green-400 bg-neutral-900 text-white font-bold focus:outline-none focus:border-pink-400 focus:bg-neutral-700 transition" required>
                            @error('telepon')
                                <span class="text-pink-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-green-400 font-bold mb-2 uppercase text-sm">Sector Location</label>
                            <input type="text" name="lokasi" value="{{ old('lokasi', $portfolio['lokasi']) }}" class="w-full px-4 py-3 border-2 border-green-400 bg-neutral-900 text-white font-bold focus:outline-none focus:border-pink-400 focus:bg-neutral-700 transition" required>
                            @error('lokasi')
                                <span class="text-pink-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Biography -->
                    <div>
                        <label class="block text-green-400 font-bold mb-2 uppercase text-sm">Core Biography</label>
                        <textarea name="tentang" rows="5" class="w-full px-4 py-3 border-2 border-green-400 bg-neutral-900 text-white font-bold focus:outline-none focus:border-pink-400 focus:bg-neutral-700 transition resize-none" required>{{ old('tentang', $portfolio['tentang']) }}</textarea>
                        @error('tentang')
                            <span class="text-pink-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center gap-6 pt-4">
                        <button type="submit" class="px-8 py-3 bg-green-400 text-neutral-900 font-black uppercase hover:bg-pink-400 hover:text-white transition text-lg border-2 border-neutral-900 shadow-lg">
                            EXECUTE_COMMIT →
                        </button>
                        <span class="text-xs text-pink-400 uppercase font-bold">Warning: Overwriting entries is permanent and tracked.</span>
                    </div>
                </form>
            </div>

            <!-- Footer Info -->
            <div class="mt-12 flex justify-between text-xs text-pink-400 font-bold uppercase tracking-widest">
                <span>Log_099x // Build_v4.0.1</span>
                <span>Kernel: Stable</span>
                <span>2026 Gravity UI Lib</span>
            </div>
        </main>
    </div>
</div>

@endsection