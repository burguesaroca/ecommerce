<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $users = array(
            ['name' => 'Seguridad Usuario', 'email' => 'seguridad@gmail.com', 'password' => \Hash::make('123456789')],
            ['name' => 'Administrador','email' => 'administrador@gmail.com','password' => \Hash::make('123456789')],
            ['name' => 'Auxiliar','email' => 'auxiliar@gmail.com','password' => \Hash::make('123456789')],
        );

        foreach($users as $user) {
            $validate = User::where('email', $user['email'])->first();
            if(!$validate) {
                User::Create($user);
            } 
        }
    }
}
