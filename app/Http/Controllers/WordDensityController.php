<?php

namespace App\Http\Controllers;

use App\Models\WordDensity;
use Illuminate\Http\Request;

class WordDensityController extends Controller
{
    public function index()
    {
        $wordDensities = WordDensity::latest()->paginate(4);

        return view('word-density.index', compact('wordDensities'))
            ->with('i', (request()->input('page', 1) - 1) * 4);
    }

    public function create()
    {
        return view('word-density.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required',
            'notes' => 'required',
        ]);

        WordDensity::create($request->all());

        return redirect()->route('word-densities.index')
            ->with('success','Item created successfully.');
    }

    public function show(WordDensity $wordDensity)
    {
        return view('word-density.show',compact('wordDensity'));
    }

    public function edit(WordDensity $wordDensity)
    {
        return view('word-density.edit',compact('wordDensity'));
    }

    public function update(Request $request, WordDensity $wordDensity)
    {
        $request->validate([
            'url' => 'required',
            'notes' => 'required',
        ]);

        $wordDensity->update($request->all());

        return redirect()->route('word-densities.index')
            ->with('success','Item updated successfully');
    }

    public function destroy(WordDensity $wordDensity)
    {
        $wordDensity->delete();

        return redirect()->route('word-densities.index')
            ->with('success','Item deleted successfully');
    }
}
