<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('username', 50)->unique();
            $table->string('email', 30);
            $table->timestamp('email_verified_at')->nullable();
            $table->text('image');
            $table->string('password', 100)->hash();
            $table->string('status', 1)->default(1);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        $user = new User();
        $user->name = "admin";
        $user->username = "admin";
        $user->email = "admin@gmail.com";
        $user->image = "images/avatar.png";
        $user->password = Hash::make(12);
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
