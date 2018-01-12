<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterViagem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('viagens', function(Blueprint $table) {
            $table->integer('origem_id');
            $table->integer('destino_id');
            $table->integer('motorista_id');
            $table->float('valor');
            $table->dropColumn('rota_id');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('viagens', function(Blueprint $table) {
            $table->dropColumn('origem_id');
            $table->dropColumn('destino_id');
            $table->dropColumn('motorista_id');
            $table->dropColumn('valor');
            $table->integer('rota_id');
        });
    }
}
