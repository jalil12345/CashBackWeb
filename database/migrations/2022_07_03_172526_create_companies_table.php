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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->boolean('sub_category')->default(false);
            $table->foreignId('affiliate_networks_id')->nullable();
            $table->decimal('rate', 10, 2)->nullable();
            $table->decimal('fix_amount', 10, 2)->nullable();
            $table->integer('companies_click_id')->nullable();
            $table->string('cj_p_id')->nullable();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->text('terms_exclutions')->nullable();
            $table->timestamps();
             
            // $table->index(['value1', 'value2']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
