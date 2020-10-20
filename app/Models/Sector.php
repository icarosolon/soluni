<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;
    protected $fillable = [
        'units_id',
        'name',
        'description'
    ];
    
    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    public function units()
    {
        return $this->belongsTo('App\Models\Unit');
    }
}
