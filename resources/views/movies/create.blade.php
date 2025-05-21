@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Tambah Movie</h2>

        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Judul</label>
                <input type="text" name="title" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Deskripsi</label>
                <textarea name="description" class="w-full border px-3 py-2 rounded" required></textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Genre</label>
                <input type="text" name="genre" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Tahun Rilis</label>
                <input type="number" name="year" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Rating (0 - 10)</label>
                <input type="number" step="0.1" min="0" max="10" name="rating" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Poster</label>
                <input type="file" name="poster" accept="image/*" class="w-full border px-3 py-2 rounded">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('movies.index') }}" class="mr-2 text-gray-500">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection
