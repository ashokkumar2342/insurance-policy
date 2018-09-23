<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('agent_id');
            $table->string('policy_no')->nullable();
            $table->string('policy_holder_name')->nullable();
            $table->string('father_name');
            $table->string('mother_name')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('gender');
            $table->string('address');
            $table->string('dob');
            $table->string('aadhaar_no');
            $table->string('pan_no');
            $table->string('policy_registration_date');
            $table->string('policy_name');
            $table->string('amount');
            $table->string('No_of_instalment');             
            $table->string('picture')->nullable();
            $table->string('doc_pan_card')->nullable();
            $table->string('doc_aadhaar_card')->nullable();
            $table->string('doc_bank_details_card')->nullable();
            $table->string('nominee_name')->nullable();
            $table->string('nominee_relation')->nullable();
            $table->string('nominee_dob')->nullable();
            $table->string('nominee_father_name')->nullable();
            $table->string('nominee_mother_name')->nullable();
            $table->string('nominee_mobile')->nullable();
            $table->string('nominee_address')->nullable();
            $table->date('start_month_year')->nullable();
            $table->date('end_month_year')->nullable();
            $table->date('no_of_year')->nullable();
            $table->string('period');
            $table->string('commission')->nullable();
            $table->string('reciept_no')->nullable();
            $table->string('reciept_date')->nullable(); 
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
        Schema::dropIfExists('policy_details');
    }
}