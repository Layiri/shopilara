<?php

namespace App\Http\Controllers;

use App\Helpers\ShopifyApi;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{


    public function index()
    {

//        GET /admin/api/2021-04/products.json
//        Retrieves a list of products
        $url_list_products = '/admin/api/2021-04/products.json';


//        GET /admin/api/2021-04/products/count.json
//        Retrieves a count of products
        $url_count_products = '/admin/api/2021-04/products/count.json';

        $product_id = 0;
//        GET /admin/api/2021-04/products/{product_id}.json
//        Retrieves a single product
        $url_single_product = '/admin/api/2021-04/products/' . $product_id . '.json';


//        POST /admin/api/2021-04/products.json
//        Creates a new product
        $url_create_new_product = '/admin/api/2021-04/products.json';

//        PUT /admin/api/2021-04/products/{product_id}.json
//        Updates a product
        $url_update_product = '/admin/api/2021-04/products/' . $product_id . '.json';

//        DELETE /admin/api/2021-04/products/{product_id}.json
//        Deletes a product
        $url_delete_products = '/admin/api/2021-04/products/' . $product_id . '.json';


        $token = \env('SHOPIFY_TOKEN');
        $domain = \env('SHOPIFY_DOMAIN');

        $allProducts = $domain .$url_list_products. '?client_id=' . $token. '&scope=read_products';


        $response = Http::get($allProducts);

//        dump($allProducts);
//
        dd($response);

//        $jsonData = $response->json();


//        dd($jsonData);


    }
}
