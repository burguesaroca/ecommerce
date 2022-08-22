<?php

use Illuminate\Database\Seeder;
use App\Model\Security\Aplication;

class AplicationTableSeeder extends Seeder
{
    public function run()
    {
        $aplications = array(
            /*01*/['name' => 'E COMMERCE','state' => 1],
        );

        foreach($aplications as $item) {
            Aplication::updateOrCreate($item);
        }
    }
}
