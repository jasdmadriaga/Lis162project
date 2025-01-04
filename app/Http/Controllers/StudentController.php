<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
    * Display a listing of the resource.
    */
   public function index()
   {
       # 1. Retrieve all faculties from the table faculties
       $students = Student::get();
       # 2. Pass the variable that contains all faculties to our view
       return view('student.index', compact('students'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('student.create');
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       $studentData = [
        'name'        =>  $request->input ('colName'),
        'college'    =>  $request->input('colPos'),
        
       ];

       Student::create($studentData);

       return redirect()->route('students.index');
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
   public function edit(Student $student)
   {
    $student = Student::findOrFail($student->student_id);
    return view('student.edit', compact('student'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
    $studentData = [
        'name'        =>  $request->input ('colName'),
        'college'    =>  $request->input('colPos')
       
    ];
    $update = Student::updateOrCreate(['student_id'=>$id], $studentData);
    
    return redirect()->route('students.index');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Student $student)
   {
    
       $delRecord = Student::findOrFail($student->student_id);
       $delRecord->delete();
       return redirect()->route('students.index');
   }
}

