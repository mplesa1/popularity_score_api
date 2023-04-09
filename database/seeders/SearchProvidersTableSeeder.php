<?php

namespace Database\Seeders;

use App\Models\SearchProvider;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SearchProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $filename = database_path('seeders/data/search_providers.json');
        $data = json_decode(file_get_contents($filename));
        $searchProviders = [];
        foreach ($data as $sp) {
            $searchProvider = [
                'name' => $sp->name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $searchProviders[] = $searchProvider;
        }

        SearchProvider::query()->insert($searchProviders);
    }
}
