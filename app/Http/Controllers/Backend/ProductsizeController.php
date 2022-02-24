<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Productsize;
use Illuminate\Http\Request;

class ProductsizeController extends Controller
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
        $datas = Productsize::all();
        return view('backend.product.size.index', compact('datas'));
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
        $data = new Productsize();
        $data->name = $request->name;
        $data->save();
        return back()->with('success', "Product Size Add Successfull!");
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productsize  $productsize
     * @return \Illuminate\Http\Response
     */
    public function edit(Productsize $productsize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productsize  $productsize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productsize $productsize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productsize  $productsize
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productsize $productsize)
    {
        //
    }
}
