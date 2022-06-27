<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id')->index();
            $table->string('national_semester_price');
            $table->text('national_semester_month');
            $table->string('national_yearly_price');
            $table->text('national_yearly_month');
            $table->string('international_semester_price');
            $table->text('international_semester_month');
            $table->string('international_yearly_price');
            $table->text('international_yearly_month');
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
        Schema::dropIfExists('fee_plans');
    }
}
