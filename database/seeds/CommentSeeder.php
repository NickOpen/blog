<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();

        for ($i=0; $i < 10; $i++) {
            Comment::create([
                'nickname'   => 'nickshi'.$i,
                'email'    => 'cfan_main@hotmain.com',
                'website' => 'www.nickshi'.$i.".com",
                'content' => 'content '.$i,
                'article_id' => '1'
            ]);
        }
    }
}
