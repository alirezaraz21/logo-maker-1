<?php

namespace App\Apis;

use App\Services\CurlService as curl;

class GetIconsBySlug
{
    //search
    private $url = 'http://api.thenounproject.com/collection/bike/icons';
// https://cors-anywhere.herokuapp.com/http://api.thenounproject.com/collection/bike/icons
    /**
     * Executa busca no blog da Uplexis.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function run($slugs)
    {   
        return (new curl())->curlGet($this->url);
    }
}
