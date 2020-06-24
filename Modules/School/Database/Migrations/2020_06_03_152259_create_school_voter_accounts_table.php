<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolVoterAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_voter_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('password');
            $table->string('username');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('voter_id');
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
        Schema::dropIfExists('school_voter_accounts');
    }
}
