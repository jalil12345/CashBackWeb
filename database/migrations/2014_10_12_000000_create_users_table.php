<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('zip_code')->nullable();
            $table->set('flavors', ['strawberry', 'vanilla'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedInteger('email_code')->nullable();
            $table->string('referral_code')->unique()->nullable();
            $table->unsignedBigInteger('referrer_id')->nullable();
            $table->string('password');
            $table->string('token')->nullable();
            $table->string('token_delete')->nullable(); 
            $table->timestamp('deleted_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
