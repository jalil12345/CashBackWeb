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
        Schema::create('cjs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->nullable();
            $table->string('cj_account-status')->nullable();
            $table->string('cj_relationship-status')->nullable();
            $table->string('cj_c_id')->nullable();
            $table->boolean('cj_sub_category')->default(false);
            $table->decimal('cj_rate', 10, 2)->nullable();
            $table->decimal('cj_fix_amount', 10, 2)->nullable();
            $table->string('cj_c_name')->nullable();
            $table->string('cj_url')->nullable();
            $table->string('cj_category')->nullable();
            $table->string('cj_image')->nullable();
            $table->text('cj_terms_exclutions')->nullable();
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
        Schema::dropIfExists('cjs');
    }
};
