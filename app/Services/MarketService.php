<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class MarketService {
    use ConsumesExternalServices, AuthorizesMarketRequests, InteractsWithMarketResponses;

    /**
     * The URL to send the requests
     * @var string
     */ 

    protected $baseUri;

    public function __construct(){
        $this->baseUri = config('services.market.base_uri');
    }

}

