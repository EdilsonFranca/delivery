<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model{
    protected $table ='tb_endereco';
	public $timestamps = false;
    protected $fillable  = array('id','numero','rua','bairro','cep','cidade');

    public function user(){
        return $this->hasOne('App\User');
    }
}
