<?php

namespace Database\Seeders;

use App\Models\CoinmarketcapData;
use App\Models\TokenModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class CollectImagesToTokensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
