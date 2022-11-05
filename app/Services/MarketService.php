<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;
use App\Traits\AuthorizesMarketRequests;
use App\Traits\InteractsWithMarketResponses;

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

     /**
     * Obtains the list of products from the API
     * @return stdClass
     */ 
     public function getProducts() {
        return $this->makeRequest('GET','products');
     }

     /**
     * Obtains the list of products from the API
     * @return stdClass
     */ 

     public function getProduct($id) {
        return $this->makeRequest('GET',"products/{$id}");
     }

     /**
     * Publish a product on the API
     * @return stdClass
     */      

     public function publishProduct($sellerId, $productData){
      return $this->makeRequest(
         'POST',
         "sellers/{$sellerId}/products",
         [],
         $productData,
         [],
         $hasFile = true
      );
     }

     /**
     * Associate a product on the category
     * @return stdClass
     */     

     public function setProductCategory($productId, $categoryId){
      return $this->makeRequest(
         'PUT',
         "products/{$productId}/categories/{$categoryId}",
      );
     }
     
     /**
     * Obtains the list of categories from the API
     * @return stdClass
     */ 
    public function getCategories() {
        return $this->makeRequest('GET','categories');
     }     

     /**
     * Obtains the list of products from the API
     * @return stdClass
     */ 

    public function getCategoryProduct($id) {
        return $this->makeRequest('GET',"categories/{$id}/products");
     }

     /**
     * Retrieve the user information from the API
     * @return stdClass
     */ 

     public function getUserInformation(){
        return $this->makeRequest('GET', 'users/me');
     }
          

}

