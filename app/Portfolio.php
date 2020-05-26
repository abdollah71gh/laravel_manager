<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
    protected $fillable=['name','tag','body','image','link'];
    protected $attributes=['status'=>1];
}

