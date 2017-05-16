<?php

namespace App\Http\Controllers;

use App\Company;
use App\ComView;
use Illuminate\Http\Request;

class ComViewController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ComView  $comView
     * @return \Illuminate\Http\Response
     */
    public function show($company)
    {
        $company = Company::find($company);
        return view ('companys.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ComView  $comView
     * @return \Illuminate\Http\Response
     */
    public function edit(ComView $comView)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ComView  $comView
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComView $comView)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ComView  $comView
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComView $comView)
    {
        //
    }
}
