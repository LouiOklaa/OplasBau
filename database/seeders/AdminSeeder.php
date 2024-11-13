<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([

            'name' => 'Loui Oklaa',
            'email' => 'Owner@louioklaa.com',
            'password' => bcrypt('loui2001@owner'),

        ]);

    }
}
