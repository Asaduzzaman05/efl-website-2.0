<?php

use App\Models\CompanyProfile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('company_name',150);
            $table->string('phone_1',15)->nullable();
            $table->string('phone_2',15)->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('slogan', 100)->nullable();
            $table->text('address');
            //Request
            $table->string('request_image')->nullable();
            $table->text('request_description')->nullable();
            // why choose us
            $table->string('why_image')->nullable();
            //About Us
            $table->text('about_description')->nullable();
            $table->string('about_image')->nullable();
            //Social Link
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('open_time', 100)->nullable();
            $table->string('close_time', 100)->nullable();
            $table->text('contact_us')->nullable();
            $table->text('achievement')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        $user = new CompanyProfile();
        $user->company_name = "Barrylabs";
        $user->phone_1 = "019999999999";
        $user->phone_2 = "phone_2";
        $user->email = "ae@gmail.com";
        $user->address = "address";
        $user->about_description = "about description";
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_profiles');
    }
}
