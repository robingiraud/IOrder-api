<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Database\Factories\CategoryFactory;
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
        User::factory(10)->create();

        Company::factory(10)
            ->has(Category::factory()->count(6))
            ->create();
    }
}
