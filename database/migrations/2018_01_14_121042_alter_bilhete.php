<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBilhete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('bilhetes', function (Blueprint $table) {
            $table->dropColumn('assento');
            $table->integer('assento_id');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bilhetes', function (Blueprint $table) {
            $table->dropColumn('assento_id');
            $table->string('assento');
        });
    }
}
