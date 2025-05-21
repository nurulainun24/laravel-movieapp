@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Daftar Film</h1>

        {{-- Notifikasi toast sukses (teks saja, tanpa ikon) --}}
        @if (session('success'))
            <div 
                id="toast-success"
                class="fixed top-4 right-4 bg-green-500 text-white px-5 py-3 rounded shadow-lg z-50"
                role="alert"
            >
                {{ session('success') }}
            </div>

            <script>
                setTimeout(() => {
                    const toast = document.getElementById('toast-success');
                    if (toast) {
                        toast.style.transition = 'opacity 0.5s ease';
                        toast.style.opacity = '0';
                        setTimeout(() => toast.remove(), 500);
                    }
                }, 3000);
            </script>
        @endif

        <a href="{{ route('movies.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Film</a>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($movies as $movie)
                <div class="bg-white rounded shadow p-4">
                    @if ($movie->poster)
                        <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}" class="mb-4 w-full h-48 object-cover rounded">
                    @endif
                    <h2 class="text-lg font-semibold">{{ $movie->title }}</h2>
                    <p class="text-gray-600 text-sm">Genre: {{ $movie->genre }}</p>
                    <p class="text-gray-600 text-sm mb-2">Tahun: {{ $movie->year }}</p>
                    <p class="text-gray-700 text-sm">{{ Str::limit($movie->description, 100) }}</p>

                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('movies.edit', $movie->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">Belum ada film.</p>
            @endforelse
        </div>
    </div>
@endsection
