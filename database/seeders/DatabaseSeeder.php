<?php

namespace Database\Seeders;

use App\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Permission::factory(10)->create();

        Permission::factory()->create([
            'name' => 'Test Permission',
            'email' => 'test@example.com',
        ]);
    }
}
