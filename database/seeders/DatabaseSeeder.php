<?php

namespace Database\Seeders;

use App\Modules\Word\Database\Seeders\WordProvidersTableSeeder;
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
        $this->call(WordProvidersTableSeeder::class);
    }
}
