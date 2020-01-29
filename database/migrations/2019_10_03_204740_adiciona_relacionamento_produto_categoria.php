<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaRelacionamentoProdutoCategoria extends Migration{
    public function up(){
        Schema::table('tb_produtos', function(Blueprint $table){
           $table->integer('categoria_id')->default(1);
     });
    }

    public function down(){
        Schema::table('tb_produtos', function(Blueprint $table){
         $table->dropColumn('categoria_id');
     });
    }
}
