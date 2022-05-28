<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGhostEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ghost_employees', function (Blueprint $table) {
            $table->id();
            $table->string('mac_id_1');
            $table->string('mac_id_2')->nullable();
            $table->string('short_info', 50)->nullable();
            $table->bigInteger('employer_id');
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
        Schema::dropIfExists('ghost_employees');
    }
}
