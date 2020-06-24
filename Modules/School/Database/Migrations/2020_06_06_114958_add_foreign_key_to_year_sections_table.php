<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyToYearSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('year_sections', function (Blueprint $table) {
            $table->foreign('section_id')
                  ->references('id')
                  ->on('schools')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('year_sections', function (Blueprint $table) {
            $table->dropForeign('year_sections_section_id_foreign');
            $table->dropIndex('year_sections_section_id_foreign');
        });
    }
}
