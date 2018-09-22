<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentMedicalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_medical_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->date('ondate');            
            $table->stirng('bloodgroup')->nullable();            
            $table->stirng('hb')->nullable();            
            $table->integer('weight');              
            $table->integer('height');              
            $table->string('narration')->nullable();              
            $table->string('vision')->nullable();            
            $table->string('complextion')->nullable();            
            $table->string('alergey')->nullable();            
            $table->string('alergey_vacc')->nullable();            
            $table->string('physical_handicapped')->nullable();            
            $table->string('id_marks1')->nullable();            
            $table->string('id_marks2')->nullable();            
            $table->string('physical_handicapped')->nullable();            
            $table->string('dental')->nullable();   
            $table->string('bp')->nullable();   
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
        Schema::dropIfExists('student_medical_infos');
    }
}
