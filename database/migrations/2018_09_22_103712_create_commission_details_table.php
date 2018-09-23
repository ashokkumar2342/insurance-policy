<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_details', function (Blueprint $table) {
           $table->increments('id');
           $table->unsignedInteger('policy_details_id');
           $table->unsignedInteger('agent_id');
           $table->decimal('per_month');
           $table->decimal('per_year');
           $table->decimal('commission_amount');
           $table->decimal('level');
           
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
        Schema::dropIfExists('commission_details');
    }
}
