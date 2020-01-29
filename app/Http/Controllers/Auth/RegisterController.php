<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Categoria;
use App\Endereco;
use App\Role;
use App\Permission;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Request;

class RegisterController extends Controller{

    use RegistersUsers;
    protected $redirectTo = '/';

    public function __construct(){
        $this->middleware('guest');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'numero' => ['required'],
        ]);
    }

    protected function create(array $data){
        $endereco=Endereco::create([
            'rua' => $data['rua'],
            'numero' => $data['numero'],
            'bairro' => $data['bairro'],
            'cep' => $data['cep']
            ]);

        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telefone'  => $data['telefone'],
            'endereco_id'  => $endereco->id,
        ]);
         $user->roles()->attach(Role::where('slug','usuario')->first());
         $user->permissions()->attach(Permission::where('slug','Permission-de-Usuario')->first());
    return $user;
    }

    public function listar(){
        $cep=Request::input('cep');
        $resposta = DB::select('select * from tbAreaDeEntrega where cep = ?', [$cep]);
       if(empty($resposta)) {
           return view('auth.register')->with('msn', 'sinto muito não entregando em sua região')->with('tipo', 'danger');
        }
           return view('auth.register')->with('msn', 'já estamos entregando em sua região')->with('tipo', 'sucess');   
      }


}
