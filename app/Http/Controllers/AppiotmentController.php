<?php

namespace App\Http\Controllers;

use App\Models\Appiotment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppiotmentController extends Controller
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
     * @param  \App\Models\Appiotment  $appiotment
     * @return \Illuminate\Http\Response
     */
    public function show(Appiotment $appiotment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appiotment  $appiotment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appiotment $appiotment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appiotment  $appiotment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appiotment $appiotment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appiotment  $appiotment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appiotment $appiotment)
    {
        //
    }


   function  accept($id){
        $appointment= Appiotment::find($id);
        $appointment->update(['status'=> 'accept']);
    return back();

   }
   function  cancel($id){
        $appointment= Appiotment::find($id);
        $appointment->update(['status' => 'cancel']);
        return back();

   }
}
