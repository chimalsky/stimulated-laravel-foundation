<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFulfillmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fulfillments', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('giver_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('wish_id')
                ->references('id')
                ->on('wishes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->unsignedSmallInteger('status')
                ->default(0);

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
        Schema::dropIfExists('grants');
    }
}
