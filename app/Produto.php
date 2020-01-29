<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Produto extends Model{
    protected $table ='tb_produtos';
    public $timestamps=false;
    protected $fillable = array('nome','preco','descricao','categoria_id','photo');

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
    public function getImageAttribute(){ 
        return $this->photo;
    }

}
