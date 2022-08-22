<?php

use Illuminate\Database\Seeder;
use App\Model\Security\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = array(
            /** seguridad usuarios */
            ['name' => 'Seguridad usuarios', 'slug' => 'seguridad', 'module_id' => 1, 'description'  => ''],
            /** admin */
            ['name' => 'Administración','slug' =>'administrador','module_id' => 1,'description'  => ''],
            /** auxiliar */
            ['name' => 'Auxiliar','slug' =>'auxiliar','module_id' => 1,'description'  => ''],            
        );

        foreach($permissions as $item) {
            Permission::updateOrCreate($item);
        }
    }
}
