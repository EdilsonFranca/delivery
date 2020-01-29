<?php
use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class UserTableSeeder extends Seeder{
    public function run(){
        $admin_role = Role::where('slug','admin')->first();
        $admin_perm = Permission::where('slug','Permission-de-Administrador')->first();
        $admin = new User();
        $admin->name = 'Edilson';
        $admin->email = 'edilson18martins@gmail.com';
        $admin->telefone='11946279867';
        $admin->endereco_id=1;
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($admin_role);
        $admin->permissions()->attach($admin_perm);
    }
}
