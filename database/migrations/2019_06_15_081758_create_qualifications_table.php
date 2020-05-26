<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('qualification_type_id');
            $table->string('institution');
            $table->string('document');
            $table->string('year_attained');
            $table->integer('is_deleted')->default(0);
            $table->timestamps();

            $table->index('employee_id');
            $table->index('qualification_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
}
