<?php

use Illuminate\Database\Seeder;
use App\Model\Gestion\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = array(
            [
                'name' => 'Arroz Diana Súper x 5kg',
                'description' => 'Arroz Diana de la mejor calidad.',
                'reference' => '1010',
                'price' => 12400,
                'stock' => 10,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/186323-1600-1600?v=637813981860700000&width=1600&height=1600&aspect=true',
                'state' => '1'           
            ],
            [
                'name' => 'Arroz Roa Súper x 5kg',
                'description' => 'Arroz Roa de la mejor calidad.',
                'reference' => '1020',
                'price' => 12450,
                'stock' => 20,
                'image' => 'https://www.arrozroa.com/landingarrozroa/wp-content/uploads/2019/12/arroz-roa-fortiplus.png',
                'state' => '1'            
            ],
            [
                'name' => 'Detergente en polvo Ariel x 5kg',
                'description' => 'Detergente Ariel de la mejor calidad.',
                'reference' => '1030',
                'price' => 35890,
                'stock' => 30,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/197727-300-300?v=637814135642330000&width=300&height=300&aspect=true',
                'state' => '1'           
            ],
            [
                'name' => 'Aceite Diana vitaminas x 3000 ml',
                'description' => 'Aceite Diana de la mejor calidad.',
                'reference' => '1040',
                'price' => 42990,
                'stock' => 40,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/209046-300-300?v=637814209562570000&width=300&height=300&aspect=true',
                'state' => '1'           
            ],
            [
                'name' => 'Café Águila Roja x 500g',
                'description' => 'Café de la mejor calidad.',
                'reference' => '1050',
                'price' => 13990,
                'stock' => 50,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/190311-300-300?v=637813996881570000&width=300&height=300&aspect=true',
                'state' => '1'           
            ],
            [
                'name' => 'Arroz vitamina plus Supremo x 10kg',
                'description' => 'Arroz Supremo de la mejor calidad.',
                'reference' => '1060',
                'price' => 39590,
                'stock' => 60,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/192008-300-300?v=637814016932400000&width=300&height=300&aspect=true',
                'state' => '1'           
            ],
            [
                'name' => 'Azúcar blanco Providencia x 2.5kg',
                'description' => 'Arroz Providencia de la mejor calidad.',
                'reference' => '1070',
                'price' => 10690,
                'stock' => 70,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/191128-300-300?v=637814011240470000&width=300&height=300&aspect=true',
                'state' => '1'           
            ],
            [
                'name' => 'Detergente Fab polvo lavado perfecto x 6kg',
                'description' => 'Detergente Fab de la mejor calidad.',
                'reference' => '11080',
                'price' => 55990,
                'stock' => 80,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/218541-300-300?v=637816516325270000&width=300&height=300&aspect=true',
                'state' => '1'           
            ],
            [
                'name' => 'Detergente Rindex polvo flores x5kg',
                'description' => 'Detergente Rindex de la mejor calidad.',
                'reference' => '1090',
                'price' => 30990,
                'stock' => 90,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/211468-300-300?v=637814227629770000&width=300&height=300&aspect=true',
                'state' => '1'           
            ],
            [
                'name' => 'Detergente Dersa polvo x 6kg',
                'description' => 'Detergente Dersa de la mejor calidad.',
                'reference' => '1100',
                'price' => 30590,
                'stock' => 100,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/215149-300-300?v=637814282018730000&width=300&height=300&aspect=true',
                'state' => '1'           
            ],
            [
                'name' => 'Suavizante Suavitel fresca primavera x 3L',
                'description' => 'Suavizante Suavitel de la mejor calidad.',
                'reference' => '1110',
                'price' => 34492,
                'stock' => 110,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/369260-300-300?v=637891864177300000&width=300&height=300&aspect=true',
                'state' => '1'           
            ],
            [
                'name' => 'Leche deslactosada Alqueria x 1100 ml x 6unid',
                'description' => 'Leche Alqueria de la mejor calidad.',
                'reference' => '1120',
                'price' => 28790,
                'stock' => 120,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/386459-300-300?v=637929114951900000&width=300&height=300&aspect=true',
                'state' => '1'           
            ],
            [
                'name' => 'Café Sello Rojo x 500g',
                'description' => 'Café Sello Rojo de la mejor calidad.',
                'reference' => '1130',
                'price' => 14590,
                'stock' => 130,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/195510-300-300?v=637814059279500000&width=300&height=300&aspect=true',
                'state' => '1'           
            ],
            [
                'name' => 'Harina PAN Blanca x 2000g',
                'description' => 'Harina PAN de la mejor calidad.',
                'reference' => '1140',
                'price' => 10580,
                'stock' => 140,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/185701-300-300?v=637813979850670000&width=300&height=300&aspect=true',
                'state' => '1'           
            ],
            [
                'name' => 'Azúcar Manuelita alta pureza x 2.5kg',
                'description' => 'Azúcar Manuelita de la mejor calidad.',
                'reference' => '1150',
                'price' => 11390,
                'stock' => 150,
                'image' => 'https://jumbocolombiaio.vtexassets.com/arquivos/ids/191126-300-300?v=637814011230470000&width=300&height=300&aspect=true',
                'state' => '1'           
            ]                                                                                                                                                                  
        );

        foreach($products as $product) {
                Product::Create($product);
        }
    }
}
