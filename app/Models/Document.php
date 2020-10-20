<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'article_id',
        'name',
        'document',
    ];

    public function article()
    {
        return $this->belongsTo('App\Models\Article', 'article_id');
    }
}
