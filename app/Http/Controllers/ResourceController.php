<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;


class ResourceController extends Controller
{
    /**
    * Display a listing of the resource.
    */
   public function index()
   {
       # 1. Retrieve all faculties from the table faculties
       $resources = Resource::get();
       # 2. Pass the variable that contains all faculties to our view
       return view('resource.index', compact('resources'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('resource.create');
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       $resourceData = [
        'resource_type'    =>  $request->input('colPos'),
        'availability_status'    =>  $request->input('colStu'),
        
       ];

       Resource::create($resourceData);

       return redirect()->route('resources.index');
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Resource $resource)
   {
    $resource = Resource::findOrFail($resource->resource_id);
    return view('resource.edit', compact('resource'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
    $resourceData = [
        'resource_type'    =>  $request->input('colPos'),
        'availability_status'    =>  $request->input('colStu'),
       
       
    ];
    $update = Resource::updateOrCreate(['resource_id'=>$id], $resourceData);
    
    return redirect()->route('resources.index');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Resource $resource)
   {
    
       $delRecord = Resource::findOrFail($resource->resource_id);
       $delRecord->delete();
       return redirect()->route('resources.index');
   }
}
