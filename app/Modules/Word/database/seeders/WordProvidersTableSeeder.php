<?php

namespace App\Modules\Word\Database\Seeders;

use App\Modules\Word\Models\WordProvider;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WordProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $filename = __DIR__. '/data/word_providers.json';
        $data = json_decode(file_get_contents($filename));
        $wordProviders = [];
        foreach ($data as $sp) {
            $wordProvider = [
                'name' => $sp->name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $wordProviders[] = $wordProvider;
        }

        WordProvider::query()->insert($wordProviders);
    }
}
