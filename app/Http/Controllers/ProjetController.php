<?php

namespace App\Http\Controllers;

use App\Models\projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $projets = Projet::where('titre', 'like', "%$search%")->paginate(10);

        //On récupère tous les Post
        $projets = Projet::all();

        // On transmet les Post à la vue
        return view("projets.index", compact("projets"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projets.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'debut' => 'required',
            'fin' => ['required', 'date', 'after:debut'],

        ]);

        projet::create($request->all());

        return redirect()->route('projets.index')
            ->with('success', 'Projet created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(projet $projet)
    {
        return view('projets.show', compact('projet'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(projet $projet)
    {

        return view('projets.edit', compact('projet'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, projet $projet)
    {
        $request->validate([
            'titre' => 'required',
            'debut' => 'required',
            'fin' => 'required',

        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(projet $projet)
    {
        $projet->delete();

        return redirect()->route('projets.index')
            ->with('success', 'Projet deleted successfully');
    }
}
