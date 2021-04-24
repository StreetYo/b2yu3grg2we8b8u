<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualInvestorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_investors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('first_name', 15);
            $table->string('last_name', 15);
            $table->string('title', 100);
            $table->string('slug', 100)->index();
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individual_investors');
    }
}
