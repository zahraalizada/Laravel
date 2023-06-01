<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /* postun bir kategoriye baglamak icin fonksiyon yaratiyoruz
        postun icerisinde category_id varsa onu cek getir demek
    */
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
