<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $data = [];

            for ($i = 1; $i <= 5; $i++) {
                $data[] = [
                    'user_id' => $i,
                    'order_status' => '0'
                ];
            }

         \DB::table('orders')->insert($data);
    }
}
