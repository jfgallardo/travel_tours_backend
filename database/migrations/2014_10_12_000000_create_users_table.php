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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('typePerson');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fullName');
            $table->string('cpf');
            $table->date('birthday');
            $table->string('cep');
            $table->string('bairro');
            $table->string('address');
            $table->string('estado');
            $table->string('number');
            $table->string('ciudade');
            $table->string('complemento')->nullable();
            $table->string('mainPhone');
            $table->string('alternativePhone')->nullable();
            $table->string('confirmation_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
};
