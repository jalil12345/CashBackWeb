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
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->string('email_associated')->nullable();
            $table->boolean('email_verification')->default(false);
            $table->string('token')->nullable();
            $table->foreignId('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_methods', function (Blueprint $table) {

            $table->dropColumn('email_associated')->nullable();
            $table->dropColumn('email_verification')->default(false);
            $table->dropColumn('token')->nullable();;
            $table->dropColumn('user_id')->nullable();;
        });
    }
};
