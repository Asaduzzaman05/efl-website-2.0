<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoGellariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_gellaries', function (Blueprint $table) {
            $table->id();
            $table->string('photo_name',150);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('thum_image')->nullable();
            $table->string('created_date')->nullable();
            $table->string('status',1)->nullable()->default('A');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_gellaries');
    }
}
