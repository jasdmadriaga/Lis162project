<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $table = 'resources';
    protected $primaryKey = 'resource_id';
    protected $fillable = [
        'resource_type', 'availability_status', 
    ];
    public $timestamps = false;
    

    public function hold() {
        return $this->hasMany(Hold::class);
        
    }
    
}
