<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $table = 'borrows';
    protected $primaryKey = 'borrow_id';
    protected $fillable = [
        'borrow_date', 'due_date', 'return_date', 'overdue_date', 'student_id', 'resource_id'
    ];
    public $timestamps = false;
    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
        
    }

    public function resource() {
        return $this->belongsToMany(Resource::class, 'resource_id');
        
    }
    
}
