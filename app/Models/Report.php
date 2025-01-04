<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'report_id';
    protected $fillable = [
        'report_date', 'report_type', 'staff_id'
    ];
    public $timestamps = false;
    public function librarystaff() {
        return $this->belongsTo(LibraryStaff::class, 'staff_id');
    }
    
}