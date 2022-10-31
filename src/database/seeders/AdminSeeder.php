<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::query()->create([
            'name'     => 'test',
            'email'    => 'test@test.test',
            'password' => Hash::make('testtest'),
        ]);
    }
}
