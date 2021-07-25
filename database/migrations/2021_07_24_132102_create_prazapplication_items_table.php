<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrazapplicationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prazapplication_items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('prazapplication_id');
            $table->integer('prazcategory_id');
            $table->integer('regyear');
            $table->string('status')->default('PENDING');
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
        Schema::dropIfExists('prazapplication_items');
    }
}
