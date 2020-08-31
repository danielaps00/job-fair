<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Applicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('idapplicants');
            $table->unsignedBigInteger('idvacancies');
            $table->foreign('idvacancies')
                  ->references('idvacancies')
                  ->on('vacancies')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('name');
            $table->string('ktp');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('email');
            $table->string('phone1');
            $table->string('phone2');
            $table->text('address');
            $table->string('photo');
            $table->boolean('active')->default(0);
            $table->timestamps();
            $table->softDeletes()->nullable();
            $table->integer('created_by')->nullable(); 
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
