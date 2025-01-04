<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Student;
use App\Models\Resource;

class BorrowController extends Controller
{
    /**
    * Display a listing of the resource.
    */
   public function index()
   {
       # 1. Retrieve all faculties from the table faculties
       $borrows = Borrow::get();
       # 2. Pass the variable that contains all faculties to our view
       return view('borrow.index', compact('borrows'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('borrow.create')->with(['students' => Student::get(), 'resources' => Resource::get()]);
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       $borrowData = [
        'borrow_date'    =>  $request->input('colPos'),
        'due_date'    =>  $request->input('colDue'),
        'return_date'    =>  $request->input('colRet'),
        'overdue_date'    =>  $request->input('colOver'),
        'student_id'    =>  $request->input('colStu'),
        'resource_id'    =>  $request->input('colresource'),
        
       ];

       Borrow::create($borrowData);

       return redirect()->route('borrows.index');
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
   public function edit(Borrow $borrow)
   {
    $borrow = Borrow::findOrFail($borrow->borrow_id);
    return view('borrow.edit', compact('borrow'))->with(['students' => Student::get(), 'resources' => Resource::get()]);
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
    $borrowData = [
        'borrow_date'    =>  $request->input('colPos'),
        'due_date'    =>  $request->input('colDue'),
        'return_date'    =>  $request->input('colRet'),
        'overdue_date'    =>  $request->input('colOver'),
        'student_id'    =>  $request->input('colStu'),
        'resource_id'    =>  $request->input('colresource'),
       
    ];
    $update = Borrow::updateOrCreate(['borrow_id'=>$id], $borrowData);
    
    return redirect()->route('borrows.index');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Borrow $borrow)
   {
    
       $delRecord = Borrow::findOrFail($borrow->borrow_id);
       $delRecord->delete();
       return redirect()->route('borrows.index');
   }
}
