<?php

namespace App\Http\Controllers;

use App\Models\Req;
use App\Http\Requests\StoreReqRequest;
use App\Http\Requests\UpdateReqRequest;

class ReqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReqRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Req $req)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Req $req)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReqRequest $request, Req $req)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Req $req)
    {
        //
    }
}
