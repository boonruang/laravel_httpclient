<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;
use App\Traits\InteractsWithMarketResponses;

class MarketAuthenticationService {
    use ConsumesExternalServices, InteractsWithMarketResponses;

    /**
     * The URL to send the requests
     * @var string
     */ 

    protected $baseUri;

    /**
     * The client id to identify the client in the API
     * @var string
     */ 

    protected $clientId;
    
    /**
     * The client secret to identify the client in the API
     * @var string
     */ 

    protected $clientSecret;
    
    /**
     * The client id to identify the password client in the API
     * @var string
     */ 

    protected $passwordClientId;
    
    
    /**
     * The client secret to identify the password client in the API
     * @var string
     */ 

    protected $passwordClientSecret;    

    public function __construct(){
        $this->baseUri = config('services.market.base_uri');
        $this->clientId = config('services.market.client_id');
        $this->clientSecret = config('services.market.client_secret');
        $this->passwordClientId = config('services.market.password_client_id');
        $this->passwordClientSecret = config('services.market.password_client_secret');
    }

    public function getClientCredentialsToken(){

      if ($token = $this->existingValidToken()) {
         return $token;
      }

      $formParams = [
         'grant_type' => 'client_credentials',
         'client_id' => $this->clientId,
         'client_secret' => $this->clientSecret,
      ];

      $tokenData = $this->makeRequest('POST', 'oauth/token', [], $formParams);

      $this->storeValidToken($tokenData,'client_credentials');

      return $tokenData->access_token;
    }

    /**
     * Stores a valid token with some attributes
     * @return void
     */ 


    public function storeValidToken($tokenData, $grantType) {
      $tokenData->token_expires_at = now()->addSeconds($tokenData->expires_in - 5);

      $tokenData->access_token = "{$tokenData->token_type} {$tokenData->access_token}";
      $tokenData->grant_type = $grantType;

      session()->put(['current_token' => $tokenData]);
    }

    /**
     * Verify if there is any valid token on session
     * @return string\boolean
     */    

    public function existingValidToken() {

      if (session()->has('current_token')) {
         $tokenData = session()->get('current_token');
         
         // lt less than
         if (now()->lt($tokenData->token_expires_at)) {
            return $tokenData->access_token;
         }
      }

      return false;

    }

}

