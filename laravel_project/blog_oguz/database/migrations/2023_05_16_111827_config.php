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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('logo',255)->nullable();
            $table->string('favicon',255)->nullable();
            $table->integer('active')->default(1);
            $table->string('facebook',255)->nullable();
            $table->string('twitter',255)->nullable();
            $table->string('github',255)->nullable();
            $table->string('linkedin',255)->nullable();
            $table->string('youtube',255)->nullable();
            $table->string('instagram',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
