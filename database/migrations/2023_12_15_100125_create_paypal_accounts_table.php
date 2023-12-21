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
        Schema::create('paypal_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('paypal_id')->unique();
            $table->string('paypal_email')->nullable();
            $table->string('paypal_name')->nullable();
            $table->text('paypal_access_token')->nullable();
            $table->timestamp('paypal_expires_at')->nullable();
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
        Schema::dropIfExists('paypal_accounts');
    }
};
