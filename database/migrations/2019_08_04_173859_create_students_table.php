<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('st_name')->nullable();
            $table->string('st_f_name')->nullable();
            $table->string('st_m_name')->nullable();
            $table->string('st_phone')->nullable();
            $table->string('st_email')->nullable();
            $table->string('st_present_add')->nullable();
            $table->string('st_permanent_add')->nullable();
            $table->string('st_blood_group')->nullable();
            $table->string('st_religion')->nullable();
            $table->string('st_class')->nullable();
            $table->string('st_section')->nullable();
            $table->string('st_session')->nullable();
            $table->string('st_roll_no')->nullable();
            $table->string('st_status')->nullable();
            $table->string('st_photo')->nullable();
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
        Schema::dropIfExists('students');
    }
}
