<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;
    protected $table = 'settings';
    public $timestamps = false;


    protected $fillable = ['value', 'key'];

    public function references()
    {
        return $this->belongsTo(References::class , 'value');
    }
}
