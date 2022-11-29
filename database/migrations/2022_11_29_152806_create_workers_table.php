<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id('id');
            $table->string('full_name');
            $table->integer('ref_number');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('workers');
    }
}
