<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Factories\TagFactory;

use Database\Factories\PostFactory;
use Database\Factories\CategoryFactory;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');

        Storage::makeDirectory('posts');

        $this->call(UserSeeder::class);

        Category::factory(4)->create();

        Tag::factory(8)->create();
        
        $this->call(PostSeeder::class);
    }
}
