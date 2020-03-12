<?php

namespace App\Http\Controllers;

use App\Pet;
use App\PetGenes;
use App\PetType;
use App\User;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pets.profile');
    }

    public function create()
    {
        $genes = PetGenes::all();
        $types = PetType::all();
        return view('pets.create', ['genes' => $genes, 'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $use_user_id = User::findOrFail(auth()->user()->id);
        $pet_type_id = PetType::findOrFail($request->input('type')->id);
        $pet_gene_id = PetGenes::findOrFail($request->input('gene')->id);
        //fix
        $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'gene' => ['required'],
            'birth-date-input' => ['required'],
            'weight' => ['required'],
        ]);

        $pet = new Pet;
        $pet->name = $request->input('name');
        $pet->user_id = $use_user_id;
        $pet->pet_type_id = $pet_type_id;
        $pet->pet_gene_id = $pet_gene_id;
        $pet->weight = $request->input('weight');
        $pet->birth_date = $request->input('birth-date-input');

        return redirect()->route('post.show', ['post' => 1]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
