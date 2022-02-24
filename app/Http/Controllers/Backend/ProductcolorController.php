<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Productcolor;
use Illuminate\Http\Request;

class ProductcolorController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Productcolor::all();
        return view('backend.product.color.index', compact('datas'));
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $data = new Productcolor();
        $data->name = $request->name;
        $data->save();
        return back()->with('success', "Product Color Add Successfull!");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productcolor  $productcolor
     * @return \Illuminate\Http\Response
     */
    public function edit(Productcolor $productcolor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productcolor  $productcolor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productcolor $productcolor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productcolor  $productcolor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productcolor $productcolor)
    {
        //
    }
}
