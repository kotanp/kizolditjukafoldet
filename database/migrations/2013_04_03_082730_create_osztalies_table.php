<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Osztaly;

class CreateOsztaliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('osztaly', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
        });

        Osztaly::create(['nev' => 'nSZF1A']);
        Osztaly::create(['nev' => 'nSZF1B']);
        Osztaly::create(['nev' => 'nSZF2A']);
        Osztaly::create(['nev' => 'nSZF2B']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('osztaly');
    }
}
