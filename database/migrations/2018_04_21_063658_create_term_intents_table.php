<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermIntentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_intents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term', 200);
            $table->unsignedInteger('intent_id');
            $table->foreign('intent_id')->references('id')->on('intents');
            $table->integer('term_count_in_intent');
            $table->integer('total_term_in_intent');
            $table->float('prob_in_intent');
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
        Schema::dropIfExists('term_intents');
    }
}
