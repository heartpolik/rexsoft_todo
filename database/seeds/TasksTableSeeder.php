<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks') -> insert ([
            'category_id' => '1',
            'name' => 'do it -1',
            'priority' => true,
            'checked' => false,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('tasks') -> insert ([
                'category_id' => '1',
                'name' => 'do it 0',
                'priority' => false,
                'checked' => false,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('tasks') -> insert ([
                'category_id' => '2',
                'name' => 'do it once',
                'priority' => true,
                'checked' => false,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('tasks') -> insert ([
                'category_id' => '3',
                'name' => 'do it 2',
                'priority' => false,
                'checked' => false,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('tasks') -> insert ([
                'category_id' => '4',
                'name' => 'do it 3',
                'priority' => false,
                'checked' => true,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('tasks') -> insert ([
                'category_id' => '5',
                'name' => 'do it 4',
                'priority' => false,
                'checked' => false,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('tasks') -> insert ([
                'category_id' => '5',
                'name' => 'do it 5',
                'priority' => true,
                'checked' => false,
                'created_at' => date('Y-m-d H:i:s')
            ]);
    }
}
