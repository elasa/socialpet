<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Wall;
use App\Publication;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }

    public function index(Request $request)
    {
        $users = User::search($request->name)->orderBy('id','DESC')->paginate(10);
        return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|string|max:255',
            'role_id' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'avatar' => 'image'
        ]);

        $user = new User;

        $user->name = $request->get('name');
        $user->role_id = $request->get('role_id');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->avatar = ( $request->file('avatar')==null ) ? "default_avatar.jpg" : $request->file('avatar')->store('public');

        $user->remember_token = str_random(60);
        $user->save();

        // crea muro del usuario
        $wall = new Wall;

        $wall->user_id = $user->id;
        $wall->save();
        // -----------------------

        // crea primera publicacion del usuario
        $publicacion = new Publication;

        $publicacion->wall_id = $wall->id;
        $publicacion->message = 'Esta es mi primera publicacion que debo ocultar';
        $publicacion->published = date('Y-m-d H:i:s');
        $publicacion->is_public = 'no';
        $publicacion->save();
        // -----------------------
        
        session()->flash('message','Usuario creado!');
        return redirect()->route('users.index');
        
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user','roles'));
    }

    public function update(User $user, Request $request)
    {
        $user->name = $request->get('name');
        $user->role_id = $request->get('role_id');
        $user->email = $request->get('email');
        //$user->password = bcrypt($request->get('password'));
        $user->avatar = ( $request->file('avatar')==null ) ? $user->avatar : $request->file('avatar')->store('public');
        $user->save();

        session()->flash('message','Usuario  mdificado!');
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('message','Usuario eliminado!');
        return redirect()->route('users.index');
    }
}
