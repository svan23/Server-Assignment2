<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'article_id';

    protected $fillable = [
        'title',
        'body',
        'create_date',
        'start_date',
        'end_date',
        'contributor_username',
    ];
}
