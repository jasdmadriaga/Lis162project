<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hold;
use App\Models\Student;
use App\Models\Resource;

class HoldController extends Controller
{
    /**
    * Display a listing of the resource.
    */
   public function index()
   {
       # 1. Retrieve all faculties from the table faculties
       $holds = Hold::get();
       # 2. Pass the variable that contains all faculties to our view
       return view('hold.index', compact('holds'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('hold.create')->with(['students' => Student::get(), 'resources' => Resource::get()]);
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       $holdData = [
        'hold_status'    =>  $request->input('colPos'),
        'student_id'    =>  $request->input('colStu'),
        'resource_id'    =>  $request->input('colresource'),
        
       ];

       Hold::create($holdData);

       return redirect()->route('holds.index');
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
   public function edit(Hold $hold)
   {
    $hold = Hold::findOrFail($hold->hold_id);
    return view('hold.edit', compact('hold'))->with(['students' => Student::get(), 'resources' => Resource::get()]);
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
    $holdData = [
        'hold_status'    =>  $request->input('colPos'),
        'student_id'    =>  $request->input('colStu'),
        'resource_id'    =>  $request->input('colresource'),
       
    ];
    $update = Hold::updateOrCreate(['hold_id'=>$id], $holdData);
    
    return redirect()->route('holds.index');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Hold $hold)
   {
    
       $delRecord = Hold::findOrFail($hold->hold_id);
       $delRecord->delete();
       return redirect()->route('holds.index');
   }
}
