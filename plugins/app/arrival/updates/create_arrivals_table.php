<?php

namespace App\Arrival\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

/**
 * CreateArrivalsTable Migration
 */
class CreateArrivalsTable extends Migration
{
    public function up()
    {
        Schema::create('app_arrival_arrivals', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned(); //Unsigned - only positive integers in id
            $table->string('user_id', 20); // 20 char max
            $table->text('name');
            $table->timestamps(); // This will automatically add created_at and updated_at columns

        });
    }

    public function down()
    {
        Schema::dropIfExists('app_arrival_arrivals');
    }
}
