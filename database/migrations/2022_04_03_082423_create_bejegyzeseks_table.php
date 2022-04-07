<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Bejegyzesek;

class CreateBejegyzeseksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bejegyzesek', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tevekenyseg_id');
            $table->unsignedBigInteger('osztaly_id');
            $table->string('allapot')->default('jóváhagyásra vár');
            $table->foreign('osztaly_id')->references('id')->on('osztaly')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tevekenyseg_id')->references('id')->on('tevekenyseg')->onDelete('cascade')->onUpdate('cascade');
            
        });

        Bejegyzesek::create(['tevekenyseg_id' => 1, 'osztaly_id' => 2, 'allapot' => 'jóváhagyásra vár']);
        Bejegyzesek::create(['tevekenyseg_id' => 2, 'osztaly_id' => 1, 'allapot' => 'elfogadva']);
        Bejegyzesek::create(['tevekenyseg_id' => 6, 'osztaly_id' => 1, 'allapot' => 'elfogadva']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bejegyzesek');
    }
}
