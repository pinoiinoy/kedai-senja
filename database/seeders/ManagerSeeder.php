<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email'=> 'manajer@kedaikopisenja.com',
        ], 
        [   'name'=> 'Manajer Kedai Kopi Senja',
            'password'=>Hash::make('Senja123!'),
            'role' => 'manajer',
        ]);
    }
}
