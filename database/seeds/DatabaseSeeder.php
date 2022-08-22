<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {  
        $this->call(AplicationTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        // $this->call(AplicationUserTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);

        $this->call(ProductSeeder::class);
    }
}
