<?php

use App\User;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Asraf Porag',
            'email' => 'asraf@aic.mail.com',
            'password' => bcrypt('asraf@aic.mail.com'),

        ]);
        Type::create([
            'name' => 'book',
            'slug' => Str::slug('book'),
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
        ]);
        Type::create([
            'name' => 'story',
            'slug' => Str::slug('story'),
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
        ]);
        Type::create([
            'name' => 'long story',
            'slug' => Str::slug('long story'),
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
        ]);
        Type::create([
            'name' => 'short story',
            'slug' => Str::slug('short story'),
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
        ]);

        Type::create([
            'name' => 'experience',
            'slug' => Str::slug('experience'),
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
        ]);
    }
}
