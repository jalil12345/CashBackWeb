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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('company_id')->nullable()->constrained();
            $table->string('trip_id')->nullable();
            $table->string('p_name')->nullable();
            $table->string('p_store')->nullable();
            $table->string('p_price')->nullable();
            $table->decimal('trip_cashback',12, 2)->nullable();
            $table->boolean('pending')->default(false);
            $table->boolean('verified')->default(false);
            $table->boolean('payable')->default(false);
            $table->decimal('paid_amount', 12, 2)->nullable()->default(0);
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
        Schema::dropIfExists('trips');
    }
};
