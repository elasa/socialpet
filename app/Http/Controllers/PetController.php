<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pet;
use App\Type;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::orderBy('id','DESC')->where('user_id', Auth::id())->paginate(10);
        return view('pet.index',compact('pets'));
    }

    public function create(Pet $pet)
    {
        $types = Type::all();
        return view('pet.create', compact('types','pet'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'user_id' => 'required',
            'type_id' => 'required',
            'name' => 'required|string|max:255',
            'age' => 'numeric',
            'color' => 'string',
        ]);

        $pet = new Pet;
        $pet->user_id = $request->get('user_id');
        $pet->type_id = $request->get('type_id');
        $pet->name = $request->get('name');
        $pet->age = $request->get('age');
        $pet->color = $request->get('color');
        $pet->description = $request->get('description');
        $pet->photo = $request->get('photo');
        $pet->save();
        
        session()->flash('message','Mascota creada correctamente!');
        return redirect()->route('pets.index');
        
    }

    public function show(Pet $pet)
    {
        return view('pet.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        $types = Type::all();

        return view('pet.edit', compact('pet','types'));
    }

    public function update(Pet $pet, Request $request)
    {
        $pet->user_id = $request->get('user_id');
        $pet->type_id = $request->get('type_id');
        $pet->name = $request->get('name');
        $pet->age = $request->get('age');
        $pet->color = $request->get('color');
        $pet->description = $request->get('description');
        $pet->photo = $request->get('photo');
        $pet->save();

        session()->flash('message','Su mascota: '.$pet->name.' ha sido mdificada correctamente!');
        return redirect()->route('pets.index');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        session()->flash('message','Mascota eliminada correctamente!');
        return redirect()->route('pets.index');
    }
}
