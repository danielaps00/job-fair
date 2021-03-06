<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vacancies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->bigIncrements('idvacancies');
            $table->unsignedBigInteger('idcompanies');
            $table->foreign('idcompanies')
                  ->references('idcompanies')
                  ->on('companies')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->enum('type', ['j', 'i']); 
            $table->string('title');
            $table->text('desc');
            $table->string('image');
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
        Schema::dropIfExists('vacancies');
    }
}
