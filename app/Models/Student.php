<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'student_id';
    protected $fillable = [
        'name', 'college'
    ];
    public $timestamps = false;
    public function waitlist() {
        return $this->hasMany(Waitlist::class);
    }
}
