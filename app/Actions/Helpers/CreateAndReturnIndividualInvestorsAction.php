<?php


namespace App\Actions\Helpers;


use App\Actions\Runnable;
use App\Models\IndividualInvestor;
use Illuminate\Support\Arr;

class CreateAndReturnIndividualInvestorsAction implements Runnable
{
    protected $models;

    public function __construct(array $investorsData)
    {
        $this->models = collect();

        foreach ($investorsData as $investorData) {
            $investor = IndividualInvestor::firstOrNew([
                'slug' => $investorData['slug']
            ]);

            if($investor->id === null) {
                $investor->fill(
                    Arr::only($investorData, $investor->getFillable())
                );

                $investor->save();

                if(isset($investorData['avatar_url']) && $investorData['avatar_url'] !== null) {
                    $investor->image()->firstOrCreate([
                        'url' => $investorData['avatar_url']
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
