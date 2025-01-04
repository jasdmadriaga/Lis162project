<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waitlist extends Model
{
    protected $table = 'waitlists';
    protected $primaryKey = 'waitlist_id';
    protected $fillable = [
        'waitlist_date', 'student_id'
    ];
    public $timestamps = false;
    
}
