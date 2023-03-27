<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;


class CategoryController extends Controller
{
    //
    public function getCategory($id){

        $category = Category::with('plants.category')->find($id);
        $plants = $category->plants;
        return response()->json($plants);
    }
    /////////////////////////////
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            
            'category' => 'required|string',
        ]);
        $category = $request->category;


        $plant = Category::create([
            
            'category' => $category,
           
        ]);
        return response()->json('added successfully');

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
    // public function show(Plants $plants , $id)
    // {
    //     //
    //     $data = Plants::Find($id);

    //     return response()->json($data);

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plants  $plants
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category ,Request $request,$id)
    {
        // //
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'category' => 'required|string',
        //     'quantity' => 'required|string',
        // ]);
        $category = $request->category;


        $plant = Category::find($id);

        $plant->category=$category;

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
    public function destroy(Category $category , $id)
    {
        //
         
    $data = Category::find($id);
    $data->delete();
    return response()->json('deleted successfully');


    }
}
