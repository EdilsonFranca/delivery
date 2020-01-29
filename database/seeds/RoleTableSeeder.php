<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RoleTableSeeder extends Seeder{
    public function run(){
        $admin_permission = Permission::where('slug','admin')->first();
        $usuario_permission = Permission::where('slug', 'usuario')->first();
        
        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'permission-de-administrador';
        $admin_role->save();
        $admin_role->permissions()->attach($admin_permission);
        
        $usuario_role = new Role();
        $usuario_role->slug = 'usuario';
        $usuario_role->name = 'permission-de-usuario';
        $usuario_role->save();
        $usuario_role->permissions()->attach($usuario_permission);
        
    }
}
