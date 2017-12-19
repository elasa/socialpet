<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::orderBy('id','DESC')->paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $role = new Role;

        $role->name = $request->get('name');
        $role->save();

        session()->flash('message','Rol creado correctamente!');

        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    public function update(Role $role, Request $request)
    {
        $role->name = $request->get('name');
        $role->save();
        session()->flash('message','Rol mdificado correctamente!');
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('message','Rol eliminado correctamente!');
        return redirect()->route('roles.index');
    }
}
