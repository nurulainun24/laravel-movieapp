@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-md bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Tambah Movie</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Deskripsi</label>
                <textarea name="description" class="w-full border px-3 py-2 rounded" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Genre</label>
                <input type="text" name="genre" value="{{ old('genre') }}" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Tahun Rilis</label>
                <input type="number" name="year" value="{{ old('year') }}" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Rating (0 - 10)</label>
                <input type="number" step="0.1" min="0" max="10" name="rating" value="{{ old('rating') }}" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Poster</label>
                <input type="file" name="poster" accept="image/*" class="w-full border px-3 py-2 rounded">
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('movies.index') }}" class="px-4 py-2 rounded border border-gray-400 text-gray-700 hover:bg-gray-100 transition">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan</button>
            </div>
            
        </form>
    </div>
</div>
@endsection
