<?php

use Illuminate\Database\Seeder;
use App\Model\Security\Module;

class ModuleTableSeeder extends Seeder
{
    public function run()
    {
        $modules = array(
            ['aplication_id'=> 1, 'name'=>'Acceso'],
        );

        foreach ($modules as $module) {
            Module::updateOrCreate($module);
        }
    }
}
