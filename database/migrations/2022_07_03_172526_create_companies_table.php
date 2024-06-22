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
            $table->boolean('sub_category')->default(false)->nullable();
            $table->string('affiliate_networks')->nullable();
            $table->string('advertiser_id')->nullable();
            $table->string('account_status')->nullable();
            $table->string('relationship_status')->nullable();
            $table->boolean('day_status')->default(false)->nullable();
            $table->decimal('rate', 15, 8)->nullable();
            $table->decimal('fix_amount', 15, 8)->nullable();
            $table->string('name')->nullable();
            $table->string('affiliate_url')->nullable();
            $table->string('url')->nullable();
            $table->string('category')->nullable();
            $table->string('image')->nullable();
            $table->text('terms_exclutions')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
