<?php

namespace App\Services;

class CurlService
{
    /**
     * @param  String $url
     * @return String
     */
    public function curlGet($url)
    {   
        echo "lol";


//         $curl = curl_init();
// $auth_data = array(
//     'client_id'         => 'XBnKaywRCrj05mM-XXX-6DXuZ3FFkUgiw45',
//     'client_secret'     => 'btHTWVNMUATHEnF-XXX-2nQabKcKVo3VXtU',
//     'grant_type'        => 'client_credentials'
// );

// curl_setopt($curl, CURLOPT_POST, 1);
// curl_setopt($curl, CURLOPT_POSTFIELDS, $auth_data);
// curl_setopt($curl, CURLOPT_URL, 'https://api-site.com/oauth/token');
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

// $result = curl_exec($curl);
// if(!$result){die("Connection Failure");}
// curl_close($curl);
// echo $result;

        //header
        $contentType = 'Content-type: json'; //probably not needed
        $auth        = env('THENOUNPROJECTKEY').':'.env('THENOUNPROJECTSECRET'); //API Key

        $heders = array(
            'client_id'         => env('THENOUNPROJECTKEY'),
            'client_secret'     => env('THENOUNPROJECTSECRET'),
            'grant_type'        => 'client_credentials',
            'Content-type'=>'json'
        );

        $method      = 'GET'; //probably not needed

        // curl init
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLINFO_HEADER_OUT    => true,
            CURLOPT_HTTPHEADER     =>$heders,
        ]);

        // curl exec
        $data = curl_exec($ch);
        curl_close($ch);

        // output
        print_r($data);
        exit;

        // $ci = curl_init();
        
        // curl_setopt($ci, CURLOPT_URL, $url);
        // curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ci, CURLOPT_FOLLOWLOCATION, true);
        // curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, false);
        // $response = curl_exec($ci);
        // if(curl_exec($ci) == false){
        //     echo 'Curl error: '.curl_error($ci);
        // }
        
        // curl_close($ci);
        // return $response;
    }
}