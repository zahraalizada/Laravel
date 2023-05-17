<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

//    Her kategoriye ait kac tane makale oldugunu sayan fonksyon
    public function articleCount(){
                   // Baglanacagimiz model, Baglanacagimiz sutun, Baglanacak id
        return $this->hasMany('App\Models\Article','category_id','id')->where('status',1)->count();
    }
}
