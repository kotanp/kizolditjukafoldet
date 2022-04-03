<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tevekenyseg;

class CreateTevekenysegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tevekenyseg', function (Blueprint $table) {
            $table->id();
            $table->string('tevekenyseg_nev');
            $table->unsignedTinyInteger('pontszam');
        });

        Tevekenyseg::create(['tevekenyseg_nev' => 'kerékpárral jöttem iskolába', 'pontszam' => '5']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'rollerrel jöttem iskolába', 'pontszam' => '4']);
        Tevekenyseg::create(['tevekenyseg_nev' => '10 km-t gyalogoltam buszozás helyett', 'pontszam' => '10']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'ültettem fát', 'pontszam' => '7']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'ültettem virágot', 'pontszam' => '3']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'ültettem egyéb növényt', 'pontszam' => '2']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'összeszedtem a szemetet egy közterületen, erdőben, stb', 'pontszam' => '5']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'tartós szatyorba vásároltam, nem nylonba', 'pontszam' => '3']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'nem használtam egyszer használatos műanyagot', 'pontszam' => '8']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'tartós csomagolású terméket vásároltam', 'pontszam' => '4']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'környezetbarát csomagolású terméket vásároltam ', 'pontszam' => '6']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'kevesebb húst ettem a héten', 'pontszam' => '7']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'ökológiai gazdaságból származó élelmiszert vettem', 'pontszam' => '5']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'kirándultam, szabadban töltöttem időt a héten', 'pontszam' => '1']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'kevesebb ruhát/terméket vásároltam a héten, hogy fenntarthatóbb legyen a környeztünk', 'pontszam' => '5']);
        Tevekenyseg::create(['tevekenyseg_nev' => 'önkénteskedtem a Greenpeace-nél, vagy más zöld szervezetnél', 'pontszam' => '9']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tevekenyseg');
    }
}
