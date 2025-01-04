<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\LibraryStaff;

class ReportController extends Controller
{
    /**
    * Display a listing of the resource.
    */
   public function index()
   {
       # 1. Retrieve all faculties from the table faculties
       $reports = Report::get();
       # 2. Pass the variable that contains all faculties to our view
       return view('report.index', compact('reports'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('report.create')->with('librarystaffs', LibraryStaff::get());
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       $reportData = [
        'report_date'    =>  $request->input('colPos'),
        'staff_id'    =>  $request->input('colStu'),
        'report_type' =>  $request->input('colRep')
       ];

       Report::create($reportData);

       return redirect()->route('reports.index');
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
   public function edit(Report $report)
   {
    $report = Report::findOrFail($report->report_id);
    return view('report.edit', compact('report'))->with('librarystaffs', LibraryStaff::get());;
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
    $reportData = [
        'report_date'    =>  $request->input('colPos'),
        'staff_id'    =>  $request->input('colStu'),
        'report_type' =>  $request->input('colRep')
       
    ];
    $update = Report::updateOrCreate(['report_id'=>$id], $reportData);
    
    return redirect()->route('reports.index');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Report $report)
   {
    
       $delRecord = Report::findOrFail($report->report_id);
       $delRecord->delete();
       return redirect()->route('reports.index');
   }
}
