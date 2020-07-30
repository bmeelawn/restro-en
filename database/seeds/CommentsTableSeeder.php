<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'comment' => 'The place where i find food delicious like home. Awesome.',
            'res_id' => 2,
            'user_id' => 1,
            'created_at' =>now()
        ]);
    }
}
