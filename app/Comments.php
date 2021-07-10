<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table='comments';
    protected $primaryKey='comment_id';

    protected $fillable=['user_id','name','product_id','comment','accept'];

    public $timestamps=false;
}
