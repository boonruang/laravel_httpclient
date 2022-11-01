<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalServices {



    public function makeRequest($method, $requestUrl, $queryParams = [], $formParams = [], $headers = []) {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $reponse = $client->request($method, $requestUrl,[
            'query' => $queryParams,
            'form_params' => $formParams,
            'headers' => $headers
        ]);

        $reponse = $reponse->getBody()->getContents();

        return $reponse;
    }
}