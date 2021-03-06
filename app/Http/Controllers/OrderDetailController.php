<?php

namespace App\Http\Controllers;

use App\Models\Order_Detail;
use App\Http\Requests\StoreOrder_DetailRequest;
use App\Http\Requests\UpdateOrder_DetailRequest;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.Order_detail');

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
     * @param  \App\Http\Requests\StoreOrder_DetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrder_DetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order_Detail  $order_Detail
     * @return \Illuminate\Http\Response
     */
    public function show(Order_Detail $order_Detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order_Detail  $order_Detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Order_Detail $order_Detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrder_DetailRequest  $request
     * @param  \App\Models\Order_Detail  $order_Detail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder_DetailRequest $request, Order_Detail $order_Detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order_Detail  $order_Detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order_Detail $order_Detail)
    {
        //
    }
}
