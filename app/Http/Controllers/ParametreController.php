<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parametre;
use App\Models\User;
class ParametreController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $params = Parametre::first();

        return view('parametres.show', compact('parametre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $params = Parametre::first();
        $params->update($request->only('last_solde_updated_at'));

        return redirect()->back()->with('success', 'Les paramètres ont été mis à jour avec succès.');
    }
}
