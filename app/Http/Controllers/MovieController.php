<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'genre' => 'required|string|max:100',
            'year' => 'required|integer',
            'rating' => 'required|numeric|min:0|max:10',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Movie::create($validated);

        return redirect()->route('movies.index')->with('success', 'File berhasil ditambahkan');
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string|max:100',
            'year' => 'required|integer',
            'rating' => 'required|numeric|min:0|max:10',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            // Hapus file lama jika ada
            if ($movie->poster) {
                Storage::disk('public')->delete($movie->poster);
            }
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $movie->update($validated);

        return redirect()->route('movies.index')->with('success', 'Film berhasil diperbarui!');
    }

    public function destroy(Movie $movie)
    {
        if ($movie->poster) {
            Storage::disk('public')->delete($movie->poster);
        }
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie berhasil dihapus.');
    }

    public function like($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->likes += 1;
        $movie->save();
    
        return back();
    }
    
    public function dislike($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->dislikes += 1;
        $movie->save();
    
        return back();
    }
    

    
    
}
