<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InitScout extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scout:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add models\' indexes and import them';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $models = [
            \App\Models\TokenModel::class
        ];

        foreach ($models as $model_class) {
            $index = (new $model_class())->searchableAs();

            Artisan::call('scout:index', [
                'name' => $index
            ]);

            Artisan::call('scout:import', [
                'model' => $model_class
            ]);
        }

        return 0;
    }
}
