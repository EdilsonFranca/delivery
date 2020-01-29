<?php
use Illuminate\Database\Seeder;
use App\Categoria;
use App\Endereco;

class DatabaseSeeder extends Seeder{

    public function run(){
        $this->call(CategoriaTableSeeder::class);
        $this->call(EnderecoTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
class CategoriaTableSeeder extends Seeder {
    public function run(){
        Categoria::create(['nome' => 'Hamburguer']);
        Categoria::create(['nome' => 'Pizza']);
        Categoria::create(['nome' => 'Refrigerante 2 litros']);
        Categoria::create(['nome' => 'Refrigerante lata']);
        Categoria::create(['nome' => 'Batata Frita']);
    }
}

class EnderecoTableSeeder extends Seeder {
    public function run(){
        Endereco::create(['logradouro-tipo' => 'Rua','rua' => 'freguesia de são','numero' => '565','bairro' => 'itaim Paulista','cep' => '08180-150']);
    }
}
// php artisan db:seed//

