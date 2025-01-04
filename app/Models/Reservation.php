<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'requests';
    protected $primaryKey = 'request_id';
    protected $fillable = [
        'request_date', 'request_status', 'student_id'
    ];
    public $timestamps = false;
    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }
    
}