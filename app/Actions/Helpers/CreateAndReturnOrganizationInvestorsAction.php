<?php


namespace App\Actions\Helpers;


use App\Actions\Runnable;
use App\Models\IndividualInvestor;
use App\Models\OrganizationInvestor;
use Illuminate\Support\Arr;

class CreateAndReturnOrganizationInvestorsAction implements Runnable
{
    protected $models;

    public function __construct(array $investorsData)
    {
        $this->models = collect();

        foreach ($investorsData as $investorData) {
            $investor = OrganizationInvestor::firstOrNew([
                'slug' => $investorData['slug']
            ]);

            if($investor->id === null) {
                $investor->fill(
                    Arr::only($investorData, $investor->getFillable())
                );

                $investor->save();

                if(isset($investorData['logo']) && $investorData['logo'] !== null) {
                    $investor->image()->firstOrCreate([
                        'url' => $investorData['logo']
                    ]);
                }
            }

            $this->models->add($investor);
        }
    }

    public function run()
    {
        return $this->models;
    }
}
