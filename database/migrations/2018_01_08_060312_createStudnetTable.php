<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudnetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Students', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('introducer_id');
            $table->string('name'); 
            $table->string('registration_date');
            $table->string('aadhaar_no');
            $table->string('pan_no');  
            $table->string('email')->unique();
            $table->string('username')->nullable();
            $table->string('password');  
            $table->string('father_name');
            $table->string('mother_name')->nullable();
            $table->date('dob');
            $table->string('gender');         
            $table->text('p_address');
            $table->text('c_address')->nullable();
            $table->string('state');
            $table->string('city');
            $table->integer('pincode');
            $table->string('mobile');
            $table->string('contact_no');           
            $table->string('picture')->nullable();
            $table->string('doc_pan_card')->nullable();
            $table->string('doc_aadhaar_card')->nullable();
            $table->string('doc_bank_details_card')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            $table->boolean('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Students');
    }
}
