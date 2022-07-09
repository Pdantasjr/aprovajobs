<?php

namespace Database\Seeders;

use App\Models\Demands;
use Illuminate\Database\Seeder;

class DemandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Demands::factory()->count(100)->create();
    }
}
