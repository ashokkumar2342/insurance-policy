<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiumDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('policy_details_id'); 
            $table->decimal('premium_amount')->nullable();
            $table->decimal('premium_month_year')->nullable();
            $table->date('due_date')->nullable();
            $table->decimal('commission')->nullable();
            $table->date('reciept_date')->nullable();
            $table->string('reciept_no')->nullable(); 
            $table->softDeletes();
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
        Schema::dropIfExists('premium_details');
    }
}
