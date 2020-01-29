<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model{
    protected $table ='tb_categorias';
	public $timestamps = false;
    protected $fillable  = array('nome');

    public function produtos(){
        return $this->hasMany('App\Produto');
    }
}
