<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       $data = User::where([['num_emp', '!=',NULL],[function($query)use ($request){
        if(($term = $request->term)){
            $query->orWhere('num_emp', 'LIKE', '%' . $term . '%')->get();
        }
       }]])


       ->orderBy('id','DESC')->paginate(6);


     return view('users.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 6);

       //$data = User::paginate(5);
       //return view('users.index', ['users' => $data]);

    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'prenom' => 'required',
            'phone' => 'required',
            'date_naiss' => 'required',
            'num_emp' => 'required',
            'address' => 'required',
            'ville' => 'required',
            'codepostal' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'avatar' =>'required'


        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));



// Vérifier si l'utilisateur a téléchargé une image
if ($request->hasFile('avatar')) {
    // Obtenir le fichier image téléchargé
    $avatar = $request->file('avatar');

    // Générer un nom de fichier unique
    $filename = time() . '_' . uniqid() . '.' . $avatar->getClientOriginalExtension();

    // Stocker l'image dans le dossier de destination
    $avatar->storeAs('public/assets/media/avatars', $filename);

    // Ajouter le nom du fichier à l'entrée utilisateur
    $input['avatar'] = $filename;
}

        return redirect()->route('users.index')
                        ->with('success','Utilisateur créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'prenom' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','Utilisateur mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function destroy($id)
{
    $user = User::find($id);
    session()->flash('warning', 'Vous êtes sur le point de supprimer l\'utilisateur ' . $user->name);
    $user->delete();
    return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès');
}
public function search(Request $request)
{
    $search = $request->input('search');
    $data = User::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->paginate(1);
    return view('users.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 1);
}







}
