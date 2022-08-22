<?php

use Illuminate\Database\Seeder;
use App\Model\Security\AplicationUser;

class AplicationUserTableSeeder extends Seeder
{
    public function run()
    {
        $aplicationUsers = array(
            ['user_id' => 1, 'aplication_id' => 1],
        );

        foreach($aplicationUsers as $item){
            AplicationUser::updateOrCreate($item);
        }
    }
}
