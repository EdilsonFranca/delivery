<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Endereco extends Migration{
    public function up() {
        Schema::create('tb_endereco', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('logradouro-tipo', ['Av', 'Rua']);	
            $table->string('rua');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cep');
        });
    }

    public function down(){
        Schema::dropIfExists('tb_endereco');
    }
}
