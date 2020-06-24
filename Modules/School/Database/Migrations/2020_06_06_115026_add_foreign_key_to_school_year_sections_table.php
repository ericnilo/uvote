<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyToSchoolYearSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_year_sections', function (Blueprint $table) {
            $table->foreign('year_section_id')
                  ->references('id')
                  ->on('year_sections')
                  ->onDelete('cascade');

            $table->foreign('school_year_id')
                  ->references('id')
                  ->on('school_years')
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
        Schema::table('school_year_sections', function (Blueprint $table) {
            $table->dropForeign('school_year_sections_year_section_id_foreign');
            $table->dropIndex('school_year_sections_year_section_id_foreign');

            $table->dropForeign('school_year_sections_school_year_id_foreign');
            $table->dropIndex('school_year_sections_school_year_id_foreign');
        });
    }
}
