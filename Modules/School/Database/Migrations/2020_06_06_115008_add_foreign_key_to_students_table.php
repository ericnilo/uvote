<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('school_year_section_id')
                  ->references('id')
                  ->on('school_year_sections')
                  ->onDelete('cascade');
            
            $table->foreign('school_id')
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
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('students_school_year_section_id_foreign');
            $table->dropIndex('students_school_year_section_id_foreign');
            
            $table->dropForeign('students_school_id_foreign');
            $table->dropIndex('students_school_id_foreign');
        });
    }
}
