<?php

namespace Database\Seeders;

use App\Models\CoinmarketcapData;
use App\Models\TokenModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectDataToTokensSeeder extends Seeder
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

        CoinmarketcapData::query()->chunkById(100, function (Collection $models) {
            $models->map(function ($model) {
                if(!isset($model->data) || $model->data['logo'] === '')
                    return;

                $token = TokenModel::where('symbol', $model->symbol)->first();

                if($token === null)
                    return;

                $token->image()->create([
                    'url' => $model->data['logo']
                ]);
            });
        });
    }
}
