<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibraryStaff extends Model
{
    protected $table = 'librarystaffs';
    protected $primaryKey = 'staff_id';
    protected $fillable = [
        'name', 'position'
    ];
    public $timestamps = false;
}
