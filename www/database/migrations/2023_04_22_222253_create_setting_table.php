<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->bigIncrements('settingId');
            $table->integer('max');
            $table->integer('min');
            $table->integer('numberOfQuestion');
            $table->integer('percentageForPass');
            $table->integer('factor');
            $table->integer('rewardRate');
            $table->integer('timeLimitaion');
            $table->integer('stars');
            $table->boolean('addition')->default(true);
            $table->boolean('subtraction')->default(true);
            $table->boolean('multiplication')->default(true);
            $table->boolean('division')->default(true);
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
        Schema::dropIfExists('setting');
    }
}
