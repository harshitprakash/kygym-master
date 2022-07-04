<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Productlist;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $products= Product::all();
        $categories= Category::all();
        $subcategories=Subcategory::all();
       return view('pages.product.productlist',compact('products','categories','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate=$this->validate($request,[
            'product_name'=>'required',
            'cat_id'=>'required',
            'sub_cat_id'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'nullable',
        ]);
        $product=Product::create([
            'product_name'=>$validate['product_name'],
            'cat_id'=>$validate['cat_id'],
            'sub_cat_id'=>$validate['sub_cat_id'],
            'description'=>$validate['description'],
            'price'=>$validate['price'],
            'image'=>'kasdkf',

        ]);

        return redirect()->route('product.index')->with('success','Product created successfully');
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
        $id= Crypt::decrypt($id);
        $product= product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('success','product deleted successfully ..!');

    }
}
