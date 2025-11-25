<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $users = [
            [
                'name' => 'Alice Example',
                'email' => 'alice@example.com',
            ],
            [
                'name' => 'Bob Example',
                'email' => 'bob@example.com',
            ],
            [
                'name' => 'Charlie Example',
                'email' => 'charlie@example.com',
            ],
        ];

        foreach ($users as $u) {
            User::factory()->create($u);
        }

    }
}
