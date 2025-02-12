<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_services', function (Blueprint $table) {
            $table->id();
            $table->string('module', 100);
            $table->string('submodule', 100);
            $table->string('module_title', 191);
            $table->string('title', 50);
            $table->text('description')->nullable();
            $table->string('image', 1)->nullable();
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
        Schema::dropIfExists('admin_services');
    }
}
