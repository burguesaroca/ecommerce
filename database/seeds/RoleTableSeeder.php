<?php

use Illuminate\Database\Seeder;
Use App\Model\Security\Role;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $roles = array(
            ['aplication_id' => 1, 'name' => 'Seguridad usuarios','slug' => 'seguridad','state' => 1],
            ['aplication_id' => 1, 'name' => 'Administrador','slug' => 'administrador','state' => 1],
            ['aplication_id' => 1, 'name' => 'Auxiliar','slug' => 'auxiliar','state' => 1],
        );

        foreach($roles as $role) {
            Role::updateOrCreate($role);
        } 
    }
}
