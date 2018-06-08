<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private function validCheck() {
        
    }

    public function up()
    {
        Schema::create('Queues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->integer('libCardNumber');
            $table->datetime('resDateBegin');  
            $table->datetime('resDateEnd');
            $table->integer('duration');   
            $table->integer('seatsQuantity');   
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
        Schema::dropIfExists('Queues');
    }
}
