<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waitlist;

class WaitlistController extends Controller
{
    /**
    * Display a listing of the resource.
    */
   public function index()
   {
       # 1. Retrieve all faculties from the table faculties
       $waitlists = Waitlist::get();
       # 2. Pass the variable that contains all faculties to our view
       return view('waitlist.index', compact('waitlists'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('waitlist.create');
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       $waitlistData = [
        'waitlist_date'    =>  $request->input('colPos'),
        'student_id'    =>  $request->input('colStu'),
        
       ];

       Waitlist::create($waitlistData);

       return redirect()->route('waitlists.index');
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
   public function edit(Waitlist $waitlist)
   {
    $waitlist = Waitlist::findOrFail($waitlist->waitlist_id);
    return view('waitlist.edit', compact('waitlist'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
    $waitlistData = [
        'waitlist_date'    =>  $request->input('colPos'),
        'student_id'    =>  $request->input('colStu'),
       
    ];
    $update = Waitlist::updateOrCreate(['waitlist_id'=>$id], $waitlistData);
    
    return redirect()->route('waitlists.index');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Waitlist $waitlist)
   {
    
       $delRecord = Waitlist::findOrFail($waitlist->waitlist_id);
       $delRecord->delete();
       return redirect()->route('waitlists.index');
   }
}
