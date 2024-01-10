<?php namespace App\Arrival\Updates;

use Illuminate\Support\Facades\DB;
use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateArrivalsTable extends Migration
{
    public function up()
    {
        dump('Before creating table');  // Debug statement
        
        Schema::create('app_arrivals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('user_id');
            $table->text('userName')->nullable();
            $table->text('arrivalName')->nullable();
            $table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });

        dump('After creating table');  // Debug statement
    }

    public function down()
    {
        dump('Before dropping table');  // Debug statement

        Schema::dropIfExists('app_arrivals');

        dump('After dropping table');  // Debug statement
    }
}
