<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

//    Hangi makale hangi kategoriye ait oldugunu bulmak icin fonksyon
    function getCategory(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }

}


