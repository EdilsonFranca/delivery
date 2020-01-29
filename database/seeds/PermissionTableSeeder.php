<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class PermissionTableSeeder extends Seeder{
    public function run(){
        $admin_role = Role::where('slug','Admin')->first();
        $usuario_role = Role::where('slug', 'usuario')->first();
        
        $total = new Permission();
        $total->slug = 'Permission-de-Administrador';
        $total->name = 'permission-de-administrador';
        $total->save();
        $total->roles()->attach($admin_role);
        
        $navegar = new Permission();
        $navegar->slug = 'Permission-de-Usuario';
        $navegar->name = 'permission-de-usuario';
        $navegar->save();
        $navegar->roles()->attach($usuario_role);
    }
    
}
