<?php

namespace App\Http\Controllers;

use Auth;
use App\Fulfillment;
use Illuminate\Http\Request;

class WishFulfillmentCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Fulfillment  $fulfillment
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Fulfillment $fulfillment)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $fulfillment->comment([
            'body' => $request->input('comment')
        ], Auth::user());

        return redirect()->route('wish.fulfillment.show', compact('fulfillment'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fulfillment  $fulfillment
     * @return \Illuminate\Http\Response
     */
    public function show(Fulfillment $fulfillment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fulfillment  $fulfillment
     * @return \Illuminate\Http\Response
     */
    public function edit(Fulfillment $fulfillment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fulfillment  $fulfillment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fulfillment $fulfillment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fulfillment  $fulfillment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fulfillment $fulfillment)
    {
        //
    }
}
