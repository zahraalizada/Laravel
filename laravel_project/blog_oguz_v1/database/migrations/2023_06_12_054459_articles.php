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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            // id-si uzerinde ilishkilendirme yapacagimiz tablonun name-i ve type-i
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('image');
            $table->string('content');
            $table->integer('hit')->default(0);
            $table->string('slug');
            $table->timestamps();

            // iliski kurma - categori alanindaki id -degrini categori_id ile bagla
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
