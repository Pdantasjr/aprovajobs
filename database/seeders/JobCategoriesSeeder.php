<?php

namespace Database\Seeders;

use App\Models\JobCategories;
use Illuminate\Database\Seeder;

class JobCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobCategories::factory()->count(10)->create();
    }
}
