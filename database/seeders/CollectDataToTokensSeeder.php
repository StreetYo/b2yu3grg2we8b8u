<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CollectDataToTokensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new CollectMainDataToTokensSeeder())->run();
        (new CollectImagesToTokensSeeder())->run();
    }
}
