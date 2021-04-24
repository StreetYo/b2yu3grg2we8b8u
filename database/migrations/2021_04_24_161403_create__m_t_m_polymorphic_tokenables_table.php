<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMTMPolymorphicTokenablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokenables', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('token_model_id')->index();
            $table->bigInteger('tokenable_id')->index();
            $table->string('tokenable_type', 200)->index();
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
        Schema::dropIfExists('tokenables');
    }
}
