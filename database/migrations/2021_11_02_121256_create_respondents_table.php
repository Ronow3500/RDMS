<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespondentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respondents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('r_id')->nullable();
            $table->string('name');
            $table->string('phone_1')->unique();
            $table->string('phone_2')->nullable();
            $table->string('phone_3')->nullable();
            $table->string('phone_4')->nullable();
            $table->string('email')->nullable();
            $table->string('occupation')->nullable();
            $table->string('region')->nullable();
            $table->string('county')->nullable();
            $table->string('sub_county')->nullable();
            $table->string('district')->nullable();
            $table->string('division')->nullable();
            $table->string('location')->nullable();
            $table->string('sub_location')->nullable();
            $table->string('constituency')->nullable();
            $table->string('ward')->nullable();
            $table->string('setting')->nullable();
            $table->string('gender')->nullable();
            $table->string('exact_age')->nullable();
            $table->string('education_level')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('income')->nullable();
            $table->string('Lsm')->nullable();
            $table->string('ethnic_group')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('age_group')->nullable();
            $table->string('last_downloaded_date')->nullable();
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
        Schema::dropIfExists('respondents');
    }
}
