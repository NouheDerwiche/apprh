<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:role-Voir-list|role-Ajouter|role-Modifier|role-supprimer', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-Ajouter', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-Modifier', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-supprimer', ['only' => ['destroy']]);
    }

   
    public function index(Request $request)
    {
        // Récupérer le rôle de l'utilisateur authentifié
        $userRole = auth()->user()->hasRole('Admin') ? 'Admin' : (auth()->user()->hasRole('DirecteurRH') ? 'DirecteurRH' : 'employe');

        // Récupérer tous les éléments si l'utilisateur est un administrateur ou rh, sinon récupérer seulement la liste
        if ($userRole === 'Admin') {
            $query = Role::query();
        } elseif ($userRole === 'DirecteurRH') {
            $query = Role::whereIn('name', ['employe', 'DirecteurRH']);
        } else {
            $query = Role::where('name', 'employe');
        }

        // Filter results based on search query
        $searchQuery = $request->query('q');
        if ($searchQuery) {
            $query->where('name', 'LIKE', '%' . $searchQuery . '%');
        }

        $roles = $query->paginate(5);

        return view('roles.index', compact('roles', 'searchQuery'))
            ->with('i', ($request->input('page', 1) - 1) * 6);
    }

    public function create()
    {
        $permission = Permission::get();
        return view('roles.create', compact('permission'));
    }
   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Rôle créé avec succès');
    }
   
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }

   
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
            ->with('success', 'Rôle mis à jour avec succès');
    }

    
    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Rôle supprimé avec succès');
    }
}
