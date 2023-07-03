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
        Schema::table('favorites', function (Blueprint $table) {
            $table->foreignId('affiliate_networks_id')->nullable();
            $table->integer('companies_click_id')->nullable();
            $table->string('name');
            $table->string('url');
            $table->string('category');
            $table->string('image');
            $table->string('rate');
            $table->string('duration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorites', function (Blueprint $table) {
            $table->dropColumn('affiliate_networks_id');
            $table->dropColumn('companies_click_id');
            $table->dropColumn('name');
            $table->dropColumn('url');
            $table->dropColumn('category');
            $table->dropColumn('image');
            $table->dropColumn('rate');
            $table->dropColumn('duration');
        });
    }
};
