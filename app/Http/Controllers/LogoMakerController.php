<?php

namespace App\Http\Controllers;

use App\Apis\GetIconsBySlug;
use App\Apis\GetIconsByTerm;
use App\Services\OAuthWrapper\OAuthRequestCall;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogoMakerController extends Controller
{
    /**
     * @return view
     */
    public function home()
    {
        return view('home');
    }
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function searchIcons(Request $request)
    {   
        $limit = !empty($request->limit) ? $request->limit : 10;
        $offset = !empty($request->offset) ? $request->offset : 0;
        $companyName = !empty($request->companyName) ? $request->companyName : 'Your Company Name';

        $keywords = explode(',', $request->keywords);

        $icons = [];
        foreach ($keywords as $keyword) {
            $keyword = str_replace(' ', '', $keyword);
            $response = (new GetIconsBySlug())->run($keyword, $limit, $offset);

            if (stripos($response, "Forbidden")) {
              $icons = $this->mockyData();
            } else if (!empty($response)) {
              $icons = array_merge($icons, json_decode($response, true)['icons']);
            }
        }

        return view('components.result-icons')->with([
            'icons' => $icons,
            'companyName' => $companyName,
            'resultsFound' =>!empty($icons),
            'tags' => implode(',', $keywords),
        ]);
    }

    public function mockyData() {
        return [
                    [
                      "attribution"=> "Bicycle by Oksana Latysheva from Noun Project",
                      "attribution_preview_url"=> "https://static.thenounproject.com/attribution/800298-600.png",
                      "date_uploaded"=> "2017-01-07",
                      "id"=> "800298",
                      "is_active"=> "1",
                      "is_explicit"=> "0",
                      "license_description"=> "creative-commons-attribution",
                      "nounji_free"=> "0",
                      "permalink"=> "/term/bicycle/800298",
                      "preview_url"=> "https://static.thenounproject.com/png/800298-200.png",
                      "preview_url_42"=> "https://static.thenounproject.com/png/800298-42.png",
                      "preview_url_84"=> "https://static.thenounproject.com/png/800298-84.png",
                      "sponsor"=> [],
                      "sponsor_campaign_link"=> null,
                      "sponsor_id"=> "",
                      "tags"=> [
                        [
                          "id"=> 83,
                          "slug"=> "bicycle"
                        ],
                        [
                          "id"=> 84,
                          "slug"=> "bike"
                        ],
                        [
                          "id"=> 6126,
                          "slug"=> "biking"
                        ],
                        [
                          "id"=> 263,
                          "slug"=> "cycling"
                        ],
                        [
                          "id"=> 2166,
                          "slug"=> "mountain-bike"
                        ],
                        [
                          "id"=> 745,
                          "slug"=> "sport"
                        ]
                      ],
                      "term"=> "Bicycle",
                      "term_id"=> 83,
                      "term_slug"=> "bicycle",
                      "updated_at"=> "2019-04-22 19=>22=>17",
                      "uploader"=> [
                        "location"=> "UA",
                        "name"=> "Oksana Latysheva",
                        "permalink"=> "/latyshevaoksana",
                        "username"=> "latyshevaoksana"
                      ],
                      "uploader_id"=> "1913957",
                      "year"=> 2017
                    ],
                    [
                      "attribution"=> "Bicycle by Oksana Latysheva from Noun Project",
                      "attribution_preview_url"=> "https://static.thenounproject.com/attribution/800299-600.png",
                      "date_uploaded"=> "2017-01-07",
                      "id"=> "800299",
                      "is_active"=> "1",
                      "is_explicit"=> "0",
                      "license_description"=> "creative-commons-attribution",
                      "nounji_free"=> "0",
                      "permalink"=> "/term/bicycle/800299",
                      "preview_url"=> "https://static.thenounproject.com/png/800299-200.png",
                      "preview_url_42"=> "https://static.thenounproject.com/png/800299-42.png",
                      "preview_url_84"=> "https://static.thenounproject.com/png/800299-84.png",
                      "sponsor"=> [],
                      "sponsor_campaign_link"=> null,
                      "sponsor_id"=> "",
                      "tags"=> [
                        [
                          "id"=> 83,
                          "slug"=> "bicycle"
                        ],
                        [
                          "id"=> 84,
                          "slug"=> "bike"
                        ],
                        [
                          "id"=> 6126,
                          "slug"=> "biking"
                        ],
                        [
                          "id"=> 263,
                          "slug"=> "cycling"
                        ],
                        [
                          "id"=> 2166,
                          "slug"=> "mountain-bike"
                        ],
                        [
                          "id"=> 745,
                          "slug"=> "sport"
                        ]
                      ],
                      "term"=> "Bicycle",
                      "term_id"=> 83,
                      "term_slug"=> "bicycle",
                      "updated_at"=> "2019-04-22 19=>22=>17",
                      "uploader"=> [
                        "location"=> "UA",
                        "name"=> "Oksana Latysheva",
                        "permalink"=> "/latyshevaoksana",
                        "username"=> "latyshevaoksana"
                      ],
                      "uploader_id"=> "1913957",
                      "year"=> 2017
                    ],
            ];
    }
}
