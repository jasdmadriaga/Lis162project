<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hold extends Model
{
    protected $table = 'holds';
    protected $primaryKey = 'hold_id';
    protected $fillable = [
        'hold_status', 'student_id', 'resource_id'
    ];
    public $timestamps = false;
    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
        
    }

    public function resource() {
        return $this->belongsToMany(Resource::class, 'resource_id');
        
    }
    
}
