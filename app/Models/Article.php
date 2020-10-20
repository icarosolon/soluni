<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'sectors_id',
        'title',
        'description',
        'rank_search',
        'rank_like',
        'keywords'
    ];

    public function documents()
    {
        return $this->hasMany('App\Models\Document');
    }

    public function steps()
    {
        return $this->hasMany('App\Models\Step');
    }

    public function sectors()
    {
        return $this->belongsTo('App\Models\Sector');
    }

}
