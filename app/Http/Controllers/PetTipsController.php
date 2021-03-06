<?php

namespace App\Http\Controllers;

use App\Pet;
use App\PetTip;

use Illuminate\Http\Request;

class PetTipsController extends Controller
{
    public function index()
    {
        $tips = PetTip::orderBy('id','desc')->get();
        return view('posts.createTip', ['tips' => $tips]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>['required'],
            'detail'=>['required']
        ]);
        $tip = new PetTip();
        $tip->title = $request->input('title');
        $tip->detail = $request->input('detail');
        $tip->save();

        return redirect()->route('petTip.index');
    }
    public function storeImage(Request $request){
        $tip = new PetTip();
        $tip->title ="";
        $tip->detail="";
        $tip->img_path = $request->file('img_path')->store('public/tips');
        $tip->save();
        return redirect()->route('petTip.index');
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
        $tip = PetTip::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required',
            'detail' => 'required'
        ]);
        $tip->title = $request->input('title');
        $tip->detail = $request->input('detail');
//        $tip->img_path = $request->file('img_path')->store('public/imgs');
        $tip->save();
        return redirect()->back();

    }

//    public function updateImage(Request $request,$id){
//        $tip =PetTip::findOrFail($id);
//        $tip->img = $request->file('img')->store('public/imgs');
//        $tip->save();
//        return redirect()->back();
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petTip = PetTip::findOrFail($id);
        $petTip->delete();
        return redirect()->route('petTip.index');
    }
}





