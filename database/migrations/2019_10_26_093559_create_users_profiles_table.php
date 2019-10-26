<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users_profiles')) {
            Schema::create('users_profiles', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('profile_id')->unsigned();
                $table->foreign('profile_id')->references('id')->on('users')->onDelete('cascade');;
                $table->string('user_name');
                $table->string('user_surname');
                $table->string('phone');
                $table->string('address');
                $table->string('country');
                $table->timestamps();
            });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_profiles');
    }
}
