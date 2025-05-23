@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Edit Movie</h2>

        <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">Judul</label>
                <input type="text" name="title" value="{{ $movie->title }}" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Deskripsi</label>
                <textarea name="description" class="w-full border px-3 py-2 rounded" required>{{ $movie->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Genre</label>
                <input type="text" name="genre" value="{{ $movie->genre }}" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Tahun Rilis</label>
                <input type="number" name="year" value="{{ $movie->year }}" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Rating (0 - 10)</label>
                <input type="number" step="0.1" min="0" max="10" name="rating" value="{{ $movie->rating }}" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Poster Baru (opsional)</label>
                <input type="file" name="poster" accept="image/*" class="w-full border px-3 py-2 rounded">
            </div>

            @if ($movie->poster)
                <div class="mb-4">
                    <label class="block mb-1">Poster Saat Ini</label>
                    <img src="{{ asset('storage/' . $movie->poster) }}" alt="Poster" class="w-32 rounded">
                </div>
            @endif

            <div class="flex justify-end space-x-2">
                <a href="{{ route('movies.index') }}" class="px-4 py-2 rounded border border-gray-400 text-gray-700 hover:bg-gray-100 transition">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan</button>
            </div>
            
        </form>
    </div>
@endsection
