<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ShopifyApi\Client;
use Shopify;

class Products extends Model
{
    use HasFactory;

    public static function shop(){
        $client = new Client();

        return Shopify::getAllProducts();

    }
}
