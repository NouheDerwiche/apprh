<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;
use App\Models\User;

class HolidayController extends Controller
{



    function __construct()
    {
         $this->middleware('permission:jours fériés-Voir-liste|jours fériés-Ajouter|jours fériés-Modifier|jours fériés-Supprimer', ['only' => ['index','store']]);
         $this->middleware('permission:jours fériés-Ajouter', ['only' => ['create','store']]);
         $this->middleware('permission:jours fériés-Modifier', ['only' => ['edit','update']]);
         $this->middleware('permission:jours fériés-Supprimer', ['only' => ['destroy']]);
    }
/* 'jours fériés-Voir-liste',
                     'jours fériés-Ajouter',
                     'jours fériés-Modifier',
                     'jours fériés-Supprimer',*/
    public function index()
    {
        $holidays = Holiday::all();

        return view('holidays.index', compact('holidays'));
    }

    public function create()
    {
        return view('holidays.create');
    }

    public function store(Request $request)
    {
        $holiday = new Holiday;

        $holiday->name = $request->name;
        $holiday->date = $request->date;

        $holiday->save();

        return redirect()->route('holidays.index')->with('success', 'Holiday added successfully.');
    }

    public function edit($id)
    {
        $holiday = Holiday::findOrFail($id);

        return view('holidays.edit', compact('holiday'));
    }

    public function update(Request $request, $id)
    {
        $holiday = Holiday::findOrFail($id);

        $holiday->name = $request->name;
        $holiday->date = $request->date;

        $holiday->save();

        return redirect()->route('holidays.index')->with('success', 'Holiday updated successfully.');
    }

    public function destroy($id)
    {
        $holiday = Holiday::findOrFail($id);

        $holiday->delete();

        return redirect()->route('holidays.index')->with('success', 'Holiday deleted successfully.');
    }

    public function show($id)
    {
        $holiday = Holiday::findOrFail($id);

        return view('holidays.show', compact('holiday'));
    }
}
