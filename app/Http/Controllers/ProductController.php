<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prod = Product::where('price','<>',0)->orderBy('id', 'desc');
        $product = $prod->get();
        $list = $prod->paginate(10);
        
        return view('admin.product_list', compact('list', 'prod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $prod = new Product();
        $prod->name = $req->name;
        $prod->id_type = $req->id_type;
        $prod->id_material = $req->id_material;
        $prod->price = $req->price;
        $prod->promotion_price = $req->promotion_price;
        $prod->quantity = $req->quantity;
        $prod->image = $req->image;
        $prod->description = $req->description;
        $prod->save();

        return redirect()->route('list_product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailProduct = Product::where('id', $id)->firstOrFail();

        return view('admin.product_read', compact('detailProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productEdit = Product::where('id', $id)->firstOrFail();

        return view('admin.product_edit', compact('productEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * e@param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Respons
     */
    public function update(Request $req, $id)
    {
        $prod = Product::findOrFail($id);
        $prod->name = $req->name;
        //$prod->id_type = $req->id_type;
        //$prod->id_material = $req->id_material;
        $prod->price = $req->price;
        $prod->promotion_price = $req->promotion_price;
        $prod->quantity = $req->quantity;
        //$prod->image = $req->image;
        $prod->description = $req->description;
        $prod->save();

        return redirect()->route('list_product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $del = Product::where('id', id)->first();
        // $del->delete();
        $del = Product::find($id);
        $del->delete();

        return redirect()->route('list_product');
    }
}
