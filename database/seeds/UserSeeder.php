<?php

use App\User;
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
    }
}
