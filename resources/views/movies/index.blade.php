@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4">
    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Film</h1>
        <a href="{{ route('movies.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Tambah Film
        </a>
    </div>

    {{-- Grid Movies --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($movies as $movie)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}" class="h-48 w-full object-cover">
                <div class="p-4">
                    <div class="flex items-center justify-between mt-4 space-x-2">
                        <form action="{{ route('movies.like', $movie->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                👍 {{ $movie->likes }}
                            </button>
                        </form>
            
                        <form action="{{ route('movies.dislike', $movie->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                👎 {{ $movie->dislikes }}
                            </button>
                        </form>
                    </div>
                    <h2 class="text-lg font-semibold">{{ $movie->title }}</h2>
                    <p class="text-sm text-gray-500 mb-1">{{ $movie->genre }} | {{ $movie->year }}</p>
                    <p class="text-sm font-medium text-yellow-600 mb-2">⭐ {{ $movie->rating }}/10</p>
                    <p class="text-gray-700 text-sm mb-3">{{ Str::limit($movie->description, 100) }}</p>
                    
                    <div class="flex justify-between">
                        <a href="{{ route('movies.edit', $movie->id) }}" class="text-sm text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Yakin hapus film ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:underline">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Belum ada film yang ditambahkan.</p>
        @endforelse
    </div>
</div>
@endsection
