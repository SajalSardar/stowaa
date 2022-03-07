<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Productsize;
use Illuminate\Support\Str;
use App\Models\Productcolor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductGallery;
use App\Models\StoreColor;
use App\Models\StoreSize;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
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
        $products = Product::with('categories')->select('id','title','sku','photo','regular_price','discount_price','status')->cursorPaginate(50);
       return view('backend.product.index', compact('products')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = Productsize::all();
        $colors = Productcolor::all();
        $categoris = Category::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('backend.product.create', compact('sizes','colors','categoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "Title = " . $request->title. '<br>';
        
        //return $request;

        // $this->validate($request, [
        //     "title" => 'required',
        //     "shot_description" => 'max:300',
        //     "regular_price" => 'required|integer',
        //     "discount_price" => 'integer',
        //     "photo" => 'required|mimes:png,jpg,jpeg,webp|max:1024',
        // ]);


        $photo = $request->file('photo');
        $photo_name = Str::slug($request->title).'_'.time().
        '.'.$photo->getClientOriginalExtension();
        $photo_upload = Image::make($photo)->crop(800,609)->save(public_path('storage/uploads/products/'.$photo_name));
        if($photo_upload){
            $productInsert = new Product();
            $productInsert->title = $request->title;
            $productInsert->sku = $request->sku;
            $productInsert->user_id = auth()->user()->id;
            $productInsert->photo = $photo_name;
            $productInsert->shot_description = $request->shot_description;
            $productInsert->description = $request->description;
            $productInsert->additional_info = $request->additional_info;
            $productInsert->regular_price = $request->regular_price;
            $productInsert->discount_price = $request->discount_price;
            $productInsert->save();
            $productInsert->categories()->attach($request->categories);

        }

        $galeries = $request->file('galeries');
        if(!empty($galeries)){
            foreach($galeries as $galery ){
                $names = Str::slug($request->title) .'_'.time() .".".$galery->getClientOriginalExtension();
                $photo_upload = Image::make($galery)->crop(800,609)->save(public_path('storage/uploads/products/galleries/'.$names));
                if($photo_upload){
                    $product_gallery = new ProductGallery();
                    $product_gallery->product_id = $productInsert->id;
                    $product_gallery->image = $names;
                    $product_gallery->save();
                }
                
            }
        }
 

        foreach($request->attr as $sizekey=>$attr){
            foreach($attr as $colorkey => $color){
                if($color['quantity']){
                    $abc = StoreSize::where(['product_id' => $productInsert->id, 'productsize_id' => $sizekey])->exists();
                    if(!$abc){
                        $store_size = new StoreSize();
                        $store_size->product_id = $productInsert->id;
                        $store_size->productsize_id = $sizekey;
                        $store_size->save();
                    }
                    $store_color = new StoreColor();
                    $store_color->store_size_id = $store_size->id;
                    $store_color->productcolor_id = $colorkey;
                    $store_color->quantity = $color['quantity'];
                    $store_color->add_price = $color['add_price'];
                    $store_color->save();
                }
                
            }
        }
        return back()->with('success', "Product add successfully done!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
