<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [];


        for ($y = 1; $y <= 5; $y++) {
            for ($i = 1; $i <= 3; $i++) {
                $data[] = [
                    'order_id' => $y,
                    'product_id' => $i,
                    'count' => rand(1,4),
                    'product_name' => 'Test Prod',
                    'product_price' => rand(40,200),
                ];
            }
        }
        \DB::table('order_product')->insert($data);
    }
}
