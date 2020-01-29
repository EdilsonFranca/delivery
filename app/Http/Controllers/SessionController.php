<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Categoria;
use Request;

class SessionController extends Controller{

   public $array_de_car = array();

      public function accessSessionData() {
      if(session()->has('sacola')){
         $produtos=array_chunk(session()->get('sacola.carr'),3);
           echo $produtos[0][0].'->'.$produtos[0][1].'->'.$produtos[0][2];     
        }else
            echo 'No data in the session';
            
   }

   public function storeSessionData() {
      session()->push('sacola.carr', Request::input('nome'));
      session()->push('sacola.carr', Request::input('quantidade'));
      session()->push('sacola.carr', Request::input('valor'));
   }
   
   public function addSession(){
      session()->put('sacola', $array_de_car);
   }
   public function deleteSessionData() {
      session()->forget('sacola');
      session()->forget('carr');
      session()->forget('sacola.carr');
      echo "Data has been removed from session.";
   }
}
