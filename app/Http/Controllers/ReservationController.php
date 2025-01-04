<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Student;

class ReservationController extends Controller
{
    /**
    * Display a listing of the resource.
    */
   public function index()
   {
       # 1. Retrieve all faculties from the table faculties
       $requests = Reservation::get();
       # 2. Pass the variable that contains all faculties to our view
       return view('request.index', compact('requests'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('request.create')->with('students', Student::get());
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       $requestData = [
        'request_date'    =>  $request->input('colPos'),
        'request_status'    =>  $request->input('colStat'),
        'student_id'    =>  $request->input('colStu'),
        
       ];

       Reservation::create($requestData);

       return redirect()->route('requests.index');
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
   public function edit(Reservation $request)
   {
    $request = Reservation::findOrFail($request->request_id);
    return view('request.edit', compact('request'))->with('students', Student::get());;
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
    $requestData = [
        'request_date'    =>  $request->input('colPos'),
        'request_status'    =>  $request->input('colStat'),
        'student_id'    =>  $request->input('colStu'),
       
    ];
    $update = Reservation::updateOrCreate(['request_id'=>$id], $requestData);
    
    return redirect()->route('requests.index');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Reservation $request)
   {
    
       $delRecord = Reservation::findOrFail($request->request_id);
       $delRecord->delete();
       return redirect()->route('requests.index');
   }
}
