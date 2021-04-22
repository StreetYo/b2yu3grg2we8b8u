<?php

namespace App\Http\Livewire;

use App\Actions\Frontend\Token\SearchTokenAction;
use Livewire\Component;

class SearchTokenSection extends Component
{
    public $searchText = 'btc';

    public function render()
    {
        $tokens = (new SearchTokenAction($this->searchText, 9))->run();

        return view('livewire.search-token-section', [
            'tokens' => $tokens
        ]);
    }
}
