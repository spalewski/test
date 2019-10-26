<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifyUsersTable extends Migration
{

    public function up()
    {
        if (!Schema::hasTable('verify_users')) {
            Schema::create('verify_users', function (Blueprint $table) {
                $table->integer('user_id');
                $table->string('token');
                $table->timestamps();
                $table->boolean('verified')->default(false);
            });
        }}

        public
        function down()
        {
            Schema::dropIfExists('verify_users');
        }
    }
