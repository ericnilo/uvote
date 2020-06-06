<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToStudentYearSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_year_sections', function (Blueprint $table) {
            $table->foreign('student_id')
                  ->references('id')
                  ->on('students')
                  ->onDelete('cascade');

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
        Schema::table('student_year_sections', function (Blueprint $table) {
            $table->dropForeign('student_year_sections_student_id_foreign');
            $table->dropIndex('student_year_sections_student_id_foreign');

            $table->dropForeign('student_year_sections_year_section_id_foreign');
            $table->dropIndex('student_year_sections_year_section_id_foreign');

            $table->dropForeign('student_year_sections_school_year_id_foreign');
            $table->dropIndex('student_year_sections_school_year_id_foreign');
        });
    }
}
