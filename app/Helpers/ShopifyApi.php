<?php


namespace App\Helpers;



use Illuminate\Support\Facades\Http;

class ShopifyApi
{

    public static function curl_request(){

//        Http::get()
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://example.com",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            print_r(json_decode($response));
        }

    }

    public static function getProduct(int $id){

    }



}
