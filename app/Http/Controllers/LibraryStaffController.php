<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LibraryStaff;

class LibraryStaffController extends Controller
{
    /**
    * Display a listing of the resource.
    */
   public function index()
   {
       # 1. Retrieve all faculties from the table faculties
       $librarystaffs = LibraryStaff::get();
       # 2. Pass the variable that contains all faculties to our view
       return view('librarystaff.index', compact('librarystaffs'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('librarystaff.create');
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       $librarystaffData = [
           'name'        =>  $request->input ('colName'),
           'position'    =>  $request->input('colPos')
       ];

       LibraryStaff::create($librarystaffData);

       return redirect()->route('librarystaffs.index');
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
   public function edit(LibraryStaff $librarystaff)
   {
    $librarystaff = LibraryStaff::findOrFail($librarystaff->staff_id);
    return view('librarystaff.edit', compact('librarystaff'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
    $librarystaffData = [
        'name'        =>  $request->input ('colName'),
        'position'    =>  $request->input('colPos')
    ];
    $update = LibraryStaff::updateOrCreate(['staff_id'=>$id], $librarystaffData);
    
    return redirect()->route('librarystaffs.index');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(LibraryStaff $librarystaff)
   {
    
       $delRecord = LibraryStaff::findOrFail($librarystaff->staff_id);
       $delRecord->delete();
       return redirect()->route('librarystaffs.index');
   }
}

