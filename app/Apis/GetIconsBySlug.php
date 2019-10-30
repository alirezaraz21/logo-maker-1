<?php

namespace App\Apis;

use App\Services\OAuthWrapper\OAuthRequestCall;

class GetIconsBySlug
{
    private $url = 'http://api.thenounproject.com/collection/#slug/icons';

    /**
     *
     * @param  string  $slug
     * @return json
     */
    public function run($slug, $limit, $offset)
    {   
	   return (new OAuthRequestCall())->call(
            str_replace('#slug', $slug, $this->url),
            [
                "limit" => $limit,
                "offset" => $offset
            ],
        );
    }
}
