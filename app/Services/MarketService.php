<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;

class MarketService {
    use ConsumesExternalServices;

    /**
     * The URL to send the requests
     * @var string
     */ 

    protected $baseUri;

    public function __construct(){
        $this->baseUri = config('services.market.base_uri');
    }

    /**
     * Resolve the elements to send when authorizing the request
     * @return void
     */ 



    public function resolveAuthorization(&$queryParams, &$formParams, &$headers){

        $accessToken = $this->resolveAccessToken();

        $headers['Authorization'] = $accessToken;
    }

    /**
     * Decode correspondingly the response
     * @return stdClass
     */

    public function decodeResponse($response){
        //
    }

    /**
     * Resolve when the request failed
     * @return void
     */

    public function checkIfErrorResponse($response){
        //
    }

    /**
     * Resolve a valid access token to use
     * @return string
     */

    public function resolveAccessToken(){
        return 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI0IiwianRpIjoiOTQ1ZWFlNDQxN2QwYjY2ZTg3NGE3ZmRhZjE1NDY4ZDE0MjEzZjliMGY2YjhkMjQ4ZmQ2ZmEzYmYzYWIyZjUwNmEzMWExMjFlMGYyNjhkOGYiLCJpYXQiOiIxNjY3Mjk3NzI2LjAzNTU2MCIsIm5iZiI6IjE2NjcyOTc3MjYuMDM1NTY3IiwiZXhwIjoiMTY5ODgzMzcyNi4wMzE0NzciLCJzdWIiOiIxMjY5Iiwic2NvcGVzIjpbInB1cmNoYXNlLXByb2R1Y3QiLCJtYW5hZ2UtcHJvZHVjdHMiLCJtYW5hZ2UtYWNjb3VudCIsInJlYWQtZ2VuZXJhbCJdfQ.oq6VNUMz3zv3f8nHO-xiQPWsWh8oLnv5HpatvRyjhcw-TgvF6uO5gJOOQ5PEz8sx6r3yL2459BmQyxen55DW2lUmLqrhGS-WxPbBl-AOlgiXgmRuGSBCjTqxOY4DW8UG0a1IIOQmp_d0Dq9DVv3ZMcHjy_OBmLxk2HPlrrvZd1OKx8jn0urlzqz9OZGerS9YwTQLOhb5aSTwQOtQYzwohuK9a0lAM_GnQ7B5j4O3-_XkhrXGSDIk5OTZQNcFlnsqn1CBmNEdMbLb7fnnD3HeFaaBYfZECV2vs05RdlcVywZ53sBjjvk-0U-gHesYuQEQQ_gQYA0g-D0nfD6hYQTbX5A49fGd-G6o8c9GCqLJ1cl_KfmcqdX-MQhrnwhhg2w_WKsYiSjNLJN0E2VZA_wyRQ39wF4A7gXQwOsAXPOg9jrxXX70BULJ682HXvNEA9oYNLfjfJuQhFT5fp_8PzfYhFda84XLB-4CXlJbHLhSTx_CC7SZ6WYpjzpZYNuLtqH4KySi27hOm4sBqTcd1zbiLB_2at90q6It4ZEvz3tIF_cgb31_qIdEg39-VM69bsTp0KKgHjKilYm1Eivvp0k2KRqPmW6EjCh3S0XceZhWxSNuJEScpg7nr_3fYWhFV7mv1Tk-s6YCsU_HxDUJkfquTo1l17ui2z76tXla8WdLnLc';
    }

}

