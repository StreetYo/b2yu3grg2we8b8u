<?php

namespace App\Http\Livewire;

use App\Actions\Frontend\Token\SearchTokenAction;
use Livewire\Component;

class SearchTokenSection extends Component
{
    public $searchText = '';

    public function render()
    {
        $tokens = (new SearchTokenAction($this->searchText, 9))->run();

        if(!$tokens->isEmpty())
            $tokens->load('image');

        return view('livewire.search-token-section', [
            'tokens' => $tokens
        ]);
    }
}
