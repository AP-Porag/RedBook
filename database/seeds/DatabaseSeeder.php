<?php

use App\Models\Category;
use App\Models\Type;
use App\Models\Story;
use App\Models\Chapter;
use App\Models\Tag;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);

        factory(User::class,10)->create();
        factory(Category::class,15)->create();
        factory(Type::class,7)->create();
        factory(Story::class,50)->create();
        factory(Chapter::class,55)->create();
        factory(Tag::class,12)->create();
    }
}
