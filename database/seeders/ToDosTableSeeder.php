<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ToDo;

class ToDosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ToDo::factory()->count(5)->create();
    }
}
