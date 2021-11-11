<?php

use App\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->delete();
        Blog::insert([[
            'description' => "The Advantages and Importance of Online Learning",
            'title' => "The Advantages and Importance of Online Learning",
            'image' => "1606072328_61779.jpg",
        ], [
            'description' => "The Importance of Study Groups",
            'title' => "The Importance of Study Groups",
            'image' => "1606072328_61779.jpg",

        ], [
            'description' => "Painting Art Lessons for High School",
            'title' => "Painting Art Lessons for High School",
            'image' => "1606072328_61779.jpg",
        ]]);
    }
}
