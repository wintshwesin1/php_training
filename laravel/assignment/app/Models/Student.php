<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'major_id',
        'phone',
        'email',
        'address',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function major()
    {
        return $this->belongsTo(Major::class,'major_id','id');
    }
}
