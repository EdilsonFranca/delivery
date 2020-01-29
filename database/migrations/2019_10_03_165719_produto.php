<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produto extends Migration{

    public function up(){
        Schema::create('tb_produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->decimal('preco', 5, 2);
            $table->decimal('preco_promocao', 5, 2);
            $table->string('photo');
            $table->string('descricao');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('tb_produtos');
    }
}
