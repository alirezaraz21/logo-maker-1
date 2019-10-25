<?php

namespace App\Http\Controllers;

use App\Apis\GetIconsBySlug;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LogoCreatorController extends Controller
{
    //search
    private $url = 'https://uplexis.com.br/blog/?s=';

    // https://cors-anywhere.herokuapp.comhttp://api.thenounproject.com/collection/bike/icons

    /**
     * @return view
     */
    public function home()
    {
        return view('home');
    }
    /**
     * Executa busca no blog da Uplexis.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return view
     */
    public function searchIcons(Request $request)
    {   
        // $headers = ['e' => env('THENOUNPROJECTKEY'), 'lol' => env('THENOUNPROJECTSECRET')];
        $headers = ['e' => $request->keywords];
        $response = (new GetIconsBySlug())->run('bikes');

         return (new Response([
                    'status' => 'success',
                    'message' => 'here is your icons!',
                    'headers' => $headers,
                    'response' => $response,
                ], 200))->header('Content-Type', 'json');

    }
}
