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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable()->constrained();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->boolean('c_status')->default(false)->nullable();
            $table->string('c_title')->nullable();
            $table->string('c_url')->nullable();
            $table->string('store')->nullable();
            $table->string('type')->nullable();
            $table->string('code')->nullable();
            $table->date('expire')->nullable();
            $table->string('used')->nullable();
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
        Schema::dropIfExists('coupons');
    }
};
