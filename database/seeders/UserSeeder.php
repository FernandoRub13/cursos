<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::create([
            'name' => 'Fernando Rubio Bailon',
            'email' => 'pablo.rubio.bailon@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole('Admin');
        User::factory(49)->create();
    }
}
