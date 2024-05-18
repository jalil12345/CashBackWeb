<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtAndUpdatedAtToSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->softDeletes(); // Add deleted_at column
            $table->timestamps();  // Add created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Drop deleted_at column
            $table->dropTimestamps();  // Drop created_at and updated_at columns
        });
    }
}
