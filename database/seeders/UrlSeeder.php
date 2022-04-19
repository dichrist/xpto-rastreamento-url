<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Url;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Url::factory()->count(10)->create();
    }
}
