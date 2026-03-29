@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-black text-white px-4 sm:px-6 py-6 sm:py-10 font-mono">

    <div class="max-w-xl mx-auto border-2 border-zinc-800 p-4 sm:p-6">

        <h1 class="text-2xl sm:text-3xl font-bold uppercase mb-6">
            Create Skill
        </h1>

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="mb-6 border-2 border-red-500 p-4 text-red-400 text-sm sm:text-base overflow-x-auto">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li class="break-word">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM --}}
        <form action="{{ route('dashboard.skills.store') }}" method="POST">
            @csrf

            {{-- SKILL NAME --}}
            <div class="mb-4">
                <label class="block mb-2 uppercase text-xs sm:text-sm font-semibold">Skill Name</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full bg-black border-2 border-zinc-700 p-2 sm:p-3 text-white focus:outline-none focus:border-green-400 text-sm sm:text-base"
                    required
                >
            </div>

            {{-- DESCRIPTION --}}
            <div class="mb-6">
                <label class="block mb-2 uppercase text-xs sm:text-sm font-semibold">Description (Optional)</label>
                <textarea
                    name="description"
                    rows="3"
                    class="w-full bg-black border-2 border-zinc-700 p-2 sm:p-3 text-white focus:outline-none focus:border-green-400 text-sm sm:text-base"
                >{{ old('description') }}</textarea>
            </div>

            {{-- BUTTON --}}
            <div class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-3">
                <a href="{{ route('dashboard.skills') }}" class="text-zinc-400 hover:text-white text-center order-2 sm:order-1 py-2 sm:py-0">
                    ← Back
                </a>

                <button
                    type="submit"
                    class="bg-green-400 text-black px-6 py-2 font-bold uppercase hover:bg-green-300 text-sm sm:text-base order-1 sm:order-2"
                >
                    Save Skill
                </button>
            </div>
        </form>

    </div>

</div>
@endsection
