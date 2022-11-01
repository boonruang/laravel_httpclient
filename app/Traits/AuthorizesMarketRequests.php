<?php

namespace App\Traits;

trait AuthorizesMarketRequests {

    /**
     * Resolve the elements to send when authorizing the request
     * @return void
     */ 

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers){

        $accessToken = $this->resolveAccessToken();

        $headers['Authorization'] = $accessToken;
    }

    /**
     * Resolve a valid access token to use
     * @return string
     */    

    public function resolveAccessToken(){
        return 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI0IiwianRpIjoiOTQxZDEyN2JkM2Q2NDNjODkwY2IzN2IzYjk4NTdjYzRlZmZmZTlhNWU3ZTQ2NjZlOGI2ODE5YzBmYmM1ZTEzMTk1YThjMmJlMzM5MjQ3YWMiLCJpYXQiOiIxNjY3MzA5Mzc2LjAyMDcyNyIsIm5iZiI6IjE2NjczMDkzNzYuMDIwNzMxIiwiZXhwIjoiMTY5ODg0NTM3Ni4wMTQ0MzgiLCJzdWIiOiIxMjY5Iiwic2NvcGVzIjpbInB1cmNoYXNlLXByb2R1Y3QiLCJtYW5hZ2UtcHJvZHVjdHMiLCJtYW5hZ2UtYWNjb3VudCIsInJlYWQtZ2VuZXJhbCJdfQ.xbjoHwGL0o1cuaWihYpnmI0xR_VKuR33qEDMD-Rdkd4WQEuMZEzEe8gExXpBjHkGBY2-v_lXe9SiYjrKD00IKstvuIzClGs8_-Aq-mPu85ref74oZhGdfjmOOWNY1LmC3-o4Zc4MReY5kc3j2IvXEkedCoFlHekputzOkrMMRm5VJDYHNHV_7FWQpZYBqa6-ESMymHvTfoV5yOhC5dfOco68o5OMC5deoP-6oBg8gtql5VpSHNyk6fUY6bv2ltoK-2BneIHQX0VycJRIgmRDIaoT94Fz5flq9k48R9-urt_I-Es1zIYE7W85fE4hZmmyrLSrxzsID6sElSkQdJXPGWkrykbG8teAePrlubJJHuSPMnhYApj-S6hODRZekzKNqV_g60rnPSqAMMjYdt_jG_2-VmUIDtAlG06Q-4Xfwrq4OoJUSg93Rf-nZagluoXQCUc48CLwdfVxet6jKPiJvmxo2sFw4zE5RhvqN7nB1vnQSPP8aIIFiXm5250mnv4q7CO6SZsBRj_FjsmZScuTvyptaY50aiMCOe7umEYJeEZ79CwGg0QzW3-Qde1xEqrHJnf1P_vdmfNdEL1xHVlifUSSg5mD4TkfUkkY4f8fgy27fKA2LOHTk3omZU6xEZpN5E4japMH-XXFaOCgRvmdZ6qgKojGoicFXQ71e-rDpJE';
    }
}