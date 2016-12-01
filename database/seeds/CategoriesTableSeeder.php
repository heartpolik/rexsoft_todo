<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories') -> insert ([
            'name' => 'private'
        ]);
        DB::table('categories') -> insert ([
            'name' => 'home'
        ]);
        DB::table('categories') -> insert ([
            'name' => 'office'
        ]);
        DB::table('categories') -> insert ([
            'name' => 'my car'
        ]);
        DB::table('categories') -> insert ([
            'name' => 'my cat'
        ]);
        DB::table('categories') -> insert ([
            'name' => 'Simon`s cat'
        ]);

    }
}
