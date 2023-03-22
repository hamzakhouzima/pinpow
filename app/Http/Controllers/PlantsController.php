<?php

namespace App\Http\Controllers;

use App\Models\Plants;
use App\Http\Requests\StorePlantsRequest;
use App\Http\Requests\UpdatePlantsRequest;
use Illuminate\Http\Request;

class PlantsController extends Controller
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
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'quantity' => 'required|string',
        ]);
        $name = $request->name;
        $category = $request->category;
        $quantity = $request->quantity;
        $path = $request->path;


        $plant = Plants::create([
            'name' => $name,
            'category' => $category,
            'quantity' => $quantity,
            'path' => $path,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlantsRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StorePlantsRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function show(Plants $plants , $id)
    {
        //
        $data = Plants::Find($id);

        return response()->json($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function edit(Plants $plants ,Request $request,$id)
    {
        // //
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'category' => 'required|string',
        //     'quantity' => 'required|string',
        // ]);
        $name =$request->name;
        $category = $request->category;
        $quantity = $request->quantity;
        $path = $request->path;


        $plant = Plants::find($id);

        $plant->name=$name;
        $plant->category=$category;
        $plant->quantity=$quantity;
        $plant->path=$path;

        $plant->save();
     
     
        return response()->json('updated successfully');



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlantsRequest  $request
     * @param  \App\Models\Plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlantsRequest $request, Plants $plants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plants $plants , $id)
    {
        //
         
    $data = Plants::find($id);
    $data->delete();
    return response()->json('deleted successfully');
    

    }
}
