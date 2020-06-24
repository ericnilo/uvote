<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyToSchoolVoterAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_voter_accounts', function (Blueprint $table) {
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
        Schema::table('school_voter_accounts', function (Blueprint $table) {
            $table->dropForeign('school_voter_accounts_school_id_foreign');
            $table->dropIndex('school_voter_accounts_school_id_foreign');
        });
    }
}
