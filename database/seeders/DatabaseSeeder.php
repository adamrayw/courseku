<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name' => 'Adam Ray',
            'email' => 'adam@courseku.id',
            'password' => Hash::make('password'),
        ]);
    }
}
