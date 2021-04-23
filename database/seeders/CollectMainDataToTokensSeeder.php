<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectMainDataToTokensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Data from coinmarketcap
        $sql = 'SELECT data->>"$.name" as "name", symbol, data->>"$.twitter_username" as "twitter", REPLACE(data->>"$.urls.source_code[0]", "https://github.com/", "") as "github" FROM `coinmarketcap_data`';
        DB::insert('INSERT IGNORE INTO tokens (name, symbol, twitter, github) ' . $sql);
    }
}
