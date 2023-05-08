<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function articleCount(){
                   // Baglanacagimiz model, Baglanacagimiz sutun, Baglanacak id
        return $this->hasMany('App\Models\Article','category_id','id')->count();
    }
}
