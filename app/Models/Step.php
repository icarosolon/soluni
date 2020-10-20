<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    protected $fillable = [
        'articles_id',
        'title',
        'description',
        'image'

    ];

    public function articles()
    {
        return $this->belongsTo('App\Models\Article');
    }
}
