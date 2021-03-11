<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [

            [
            	'title' => 'Men',
            	'slug' => 'men',
            	  'description' => 'Men',
            	 'parent_id' => '0',

        ],
            [
            	'title' => 'Women',
            	'slug' => 'women',
            	  'description' => 'Women',
            	 'parent_id' => '0',

        ],
            [
            	'title' => 'Kids',
            	'slug' => 'kids',
            	  'description' => 'Kids',
            	 'parent_id' => '0',

        ],
            [
            	'title' => 'Электронные',
            	'slug' => 'elektronnye',
            	  'description' => 'Электронные',
            	 'parent_id' => '1',

        ],
            [
            	'title' => 'Механические',
            	'slug' => 'mehanicheskie',
            	  'description' => 'mehanicheskie',
            	 'parent_id' => '1',

        ],
            [
            	'title' => 'Casio',
            	'slug' => 'casio',
            	 'description' => 'Casio',
            	 'parent_id' => '4',

        ],
            [
            	'title' => 'Citizen',
            	'slug' => 'citizen',
            	 'description' => 'Citizen',
            	 'parent_id' => '4',

        ],
            [
            	'title' => 'Royal London',
            	'slug' => 'royal-london',
            	  'description' => 'Royal London',
            	 'parent_id' => '5',

        ],
            [
            	'title' => 'Seiko',
            	'slug' => 'seiko',
            	  'description' => 'Seiko',
            	 'parent_id' => '5',

        ],
            [
             'title' => 'Epos',
             'slug' => 'epos',
               'description' => 'Epos',
              'parent_id' => '5',

        ],
            [
             'title' => 'Электронные',
             'slug' => 'elektronnye-11',
               'description' => 'Электронные',
              'parent_id' => '2',

        ],
            [
             'title' => 'Механические',
             'slug' => 'mehanicheskie-12',
               'description' => 'Механические',
              'parent_id' => '2',

        ],
            [
             'title' => 'Adriatica',
             'slug' => 'adriatica',
               'description' => 'Adriatica',
              'parent_id' => '11',

        ],
            [
             'title' => 'Anne Klein',
             'slug' => 'nne-klein',
               'description' => 'Anne Klein',
              'parent_id' => '12',

        ],
            [
             'title' => 'Для девочек',
             'slug' => 'girls',
               'description' => 'girls',
              'parent_id' => '3',

        ],
            [
             'title' => 'Для мальчиков',
             'slug' => 'boys',
               'description' => 'boys',
              'parent_id' => '3',
        ],

        ];

        \DB::table('categories')->insert($data);
    }
}
