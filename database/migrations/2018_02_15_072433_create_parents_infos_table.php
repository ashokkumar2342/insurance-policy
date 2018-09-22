<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');            
            $table->unsignedInteger('relationtype_id');            
            $table->stirng('name');            
            $table->stirng('education');            
            $table->stirng('occupation');            
            $table->integer('income');            
            $table->integer('mobile');            
            $table->string('email')->nullable();            
            $table->date('dob');            
            $table->date('bom')->nullable();            
            $table->string('office_address')->nullable();            
            $table->string('photo')->nullable();            
            $table->boolean('islive');            
            $table->softDeletes();        
            $table->timestamps();
            $table->boolean('status')->default('1');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parents_infos');
    }
}
