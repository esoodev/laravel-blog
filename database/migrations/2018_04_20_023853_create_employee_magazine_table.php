<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeMagazineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_magazine', function (Blueprint $table) {
            $table->integer('employee_id')->unsigned()->index();
            $table->foreign('employee_id')->references('id')
                ->on('employees')->onDelete('cascade');
            $table->integer('magazine_id')->unsigned()->index();
            $table->foreign('magazine_id')->references('id')
                ->on('magazines')->onDelete('cascade');
            $table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')
                ->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_magazine');
    }
}
