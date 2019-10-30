<?php

namespace App\Services\OAuthWrapper;

use App\Services\Curl\CurlService;

class OAuthRequestCall {

    public function call($url, $args = []) {
        $consumer = new OAuthConsumer(env('THENOUNPROJECTKEY'), env('THENOUNPROJECTSECRET'));
        $request = OAuthRequest::from_consumer_and_token($consumer, NULL,"GET", $url, $args);
        $request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, NULL);

        $url = sprintf("%s?%s", $url, OAuthUtil::build_http_query($args));
        $headers = array($request->to_header());

        $ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		return curl_exec($ch);
    }
}