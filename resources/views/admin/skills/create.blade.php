@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-black text-white px-6 py-10 font-mono">

    <div class="max-w-xl mx-auto border-2 border-zinc-800 p-6">

        <h1 class="text-3xl font-bold uppercase mb-6">
            Create Skill
        </h1>

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="mb-6 border-2 border-red-500 p-4 text-red-400">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM --}}
        <form action="{{ route('dashboard.skills.store') }}" method="POST">
            @csrf

            {{-- SKILL NAME --}}
            <div class="mb-4">
                <label class="block mb-2 uppercase text-sm">Skill Name</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full bg-black border-2 border-zinc-700 p-2 text-white focus:outline-none focus:border-green-400"
                    required
                >
            </div>

            {{-- DESCRIPTION --}}
            <div class="mb-6">
                <label class="block mb-2 uppercase text-sm">Description (Optional)</label>
                <textarea
                    name="description"
                    rows="4"
                    class="w-full bg-black border-2 border-zinc-700 p-2 text-white focus:outline-none focus:border-green-400"
                >{{ old('description') }}</textarea>
            </div>

            {{-- BUTTON --}}
            <div class="flex justify-between items-center">
                <a href="{{ route('dashboard.skills') }}" class="text-zinc-400 hover:text-white">
                    ← Back
                </a>

                <button
                    type="submit"
                    class="bg-green-400 text-black px-6 py-2 font-bold uppercase hover:bg-green-300"
                >
                    Save Skill
                </button>
            </div>
        </form>

    </div>

</div>
@endsection
