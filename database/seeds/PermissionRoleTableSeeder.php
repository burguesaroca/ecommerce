<?php

use Illuminate\Database\Seeder;
use App\Model\Security\PermissionRole;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $permission_role = array(
            ['permission_id' => 1, 'role_id' => 1],
            ['permission_id' => 2, 'role_id' => 2],
            ['permission_id' => 3, 'role_id' => 3],
        );

        foreach ($permission_role as $pr) {
            PermissionRole::updateOrCreate($pr);
        }
    }
}
