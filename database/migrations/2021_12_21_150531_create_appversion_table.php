<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppversionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appversion', function (Blueprint $table) {
            $table->id();
            $table->string('version')->default(1.0);
            $table->timestamps();
        });

        DB::table('appversion')->insert(
            array(
                'id' => 1,
                'version' => '1.0',
            )
        );
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appversion');
    }
}