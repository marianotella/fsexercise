<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Item extends Model
{
    //
    protected $connection = 'mongodb';
    protected $collection = 'items';

    protected $fillable = [
        'picture',
        'description',
        'order'
    ];
}