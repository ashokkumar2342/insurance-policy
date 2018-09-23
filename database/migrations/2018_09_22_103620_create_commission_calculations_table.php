<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_calculations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('policy_details_id');
            $table->decimal('commission');
            $table->decimal('expenses');
            $table->decimal('profit');
            $table->decimal('level_1');
            $table->decimal('level_2');
            $table->decimal('level_3');
            $table->decimal('level_4');
            $table->decimal('level_6');
            $table->timestamps();
            $table->boolean('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commission_calculations');
    }
}
