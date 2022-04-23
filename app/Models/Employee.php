<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = ['name', 'status_id', 'salary'];
    public $timestamps = false;

    public function status()
    {
        return $this->belongsTo(References::class, 'status_id');
    }

    public function overtime()
    {
        return $this->hasMany(Overtime::class);
    }
}
