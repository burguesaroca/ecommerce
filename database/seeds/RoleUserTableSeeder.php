<?php

use Illuminate\Database\Seeder;
Use App\Model\Security\RoleUser;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        $roleUsers = array(
            ['role_id' => 1, 'user_id'=> 1],
            ['role_id' => 2, 'user_id'=> 2],
            ['role_id' => 3, 'user_id'=> 2],
            ['role_id' => 3, 'user_id'=> 3],            
        );

        foreach($roleUsers as $roleUser) {
            RoleUser::updateOrCreate($roleUser);
        }
    }
}
