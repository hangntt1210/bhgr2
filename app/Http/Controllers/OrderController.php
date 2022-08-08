<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Orders;
use App\Models\OrderItem;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ord = Orders::where('total','<>',0)->orderBy('id', 'desc');
        $order = $ord->get();
        $list = $ord->paginate(10);
        
        return view('admin.order_list', compact('list', 'order'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailOrder = Orders::where('id', $id)->firstOrFail();
        $listProduct = OrderItem::where('id_order', $id)->get();

        return view('admin.order_read', compact('detailOrder', 'listProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderEdit = Orders::where('id', $id)->firstOrFail();
        $listProduct = OrderItem::where('id_order', $id)->get();

        return view('admin.order_edit', compact('orderEdit', 'listProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $prod = Orders::findOrFail($id);
        $prod->status = $req->status;
        $prod->save();

        return redirect()->route('list_order');
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
