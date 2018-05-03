<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('original_text', 200);
            $table->string('tokenized_text', 200)->nullable();
            $table->string('text', 200)->nullable();
            $table->integer('number_token')->nullable();
            $table->string('tokens')->nullable(); // json_array for array of tokens
            $table->unsignedInteger('intent_id');
            $table->foreign('intent_id')->references('id')->on('intents');
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
        Schema::dropIfExists('documents');
    }
}
