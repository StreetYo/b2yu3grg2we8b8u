<?php

namespace Database\Seeders;

use App\Actions\Helpers\CreateAndReturnIndividualInvestorsAction;
use App\Actions\Helpers\CreateAndReturnOrganizationInvestorsAction;
use App\Facades\Json;
use App\Models\TokenModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectDataToInvestorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TokenModel::query()->chunkById(10, function (Collection $tokens) {
            $tokens->map(function (TokenModel $token) {
                $data = DB::table('messari_data_models')->where('symbol', $token->symbol)->get([
                    'data->profile->investors as investors'
                ])->first();

                if ($data === null || !Json::isJson($data->investors))
                    return;

                $investors = Json::decode($data->investors);

                if (isset($investors['individuals'])) {
                    $investors = (new CreateAndReturnIndividualInvestorsAction(
                        $investors['individuals']
                    ))->run();

                    $token
                        ->individualInvestors()
                        ->sync($investors->pluck('id'));
                }

                if (isset($investors['organizations'])) {
                    $investors = (new CreateAndReturnOrganizationInvestorsAction(
                        $investors['organizations']
                    ))->run();

                    $token
                        ->organizationInvestors()
                        ->sync($investors->pluck('id'));
                }
            });
        });
    }
}
