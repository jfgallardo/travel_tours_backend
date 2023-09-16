<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name', 100);
            $table->string('last_name', 100);
            $table->string('email', 100);
            $table->string('id_cpf', 20);
            $table->date('date_birth');
            $table->string('phone', 50);
            $table->string('number_passport', 50);
            $table->date('pass_validity');
            $table->date('pass_issue');
            $table->string('contry_issue', 50);
            $table->string('contry_residence', 50);
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
        Schema::dropIfExists('passengers');
    }
};
