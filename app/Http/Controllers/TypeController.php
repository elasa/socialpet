<?php

namespace App\Http\Controllers;
use App\Type;

use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        $types = Type::orderBy('id','DESC')->paginate(10);
        return view('admin.type.index', compact('types'));
    }

    public function create()
    {
        return view('admin.type.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $type = new Type;

        $type->name = $request->get('name');
        $type->save();

        session()->flash('message','Tipo de mascota creado correctamente!');

        return redirect()->route('types.index');
    }

    public function show(Type $type)
    {
        return view('admin.type.show', compact('type'));
    }

    public function edit(Type $type)
    {
        return view('admin.type.edit', compact('type'));
    }

    public function update(Type $type, Request $request)
    {
        $type->name = $request->get('name');
        $type->save();
        session()->flash('message','Tipo de mascota mdificado correctamente!');
        return redirect()->route('types.index');
    }

    public function destroy(Type $type)
    {
        $type->delete();
        session()->flash('message','Tipo de mascota eliminado correctamente!');
        return redirect()->route('types.index');
    }
}
