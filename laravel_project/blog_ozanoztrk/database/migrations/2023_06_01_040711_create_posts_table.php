<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->integer('category_id')->unsigned()->nullable();
            /*
                foreign() ile - category_id baglanicak
                references() ile - hangi tablo sutununa referans olacagini yaziyoruz
                on() ile - hangi tablo uzerinden baglanicak yaziyoruz
                Note: bu formada tanimlandigi zaman categoriler silinmek isterse post silinmeyecek izin vermeyecek
                onDelete('CASCADE) - metoduyla kategori silindiyi zaman iceriyi de silmesini soyluyoruz
                bura bitdikden sonra modelde de baglamak lazm categori ve post tablolarini
             */
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
