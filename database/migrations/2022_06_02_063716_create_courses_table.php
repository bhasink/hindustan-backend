<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_desc');
            $table->date('start_date');
            $table->integer('duration');
            $table->string('brochure');
            $table->text('about_program');
            $table->text('about_specialization');
            $table->text('specialization_highlights');
            $table->text('eligibility');
            $table->text('banner');
            $table->text('mob_banner');
            $table->text('thumbnail');
            $table->text('hiring_companies');
            $table->boolean('course_type');
            $table->boolean('is_trending');
            $table->boolean('status');
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
        Schema::dropIfExists('courses');
    }
}
