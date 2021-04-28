<?php

namespace App\Models;

use App\Helpers\ShopifyApi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "shopify_auth".
 *
 * @property int $id
 * @property string $shop_name
 * @property string $api_key
 * @property string $scopes
 * @property string $token
 * @property string $api_secret_key
 * @property int  user_id
 *
 * @property User $user

 * @package App\Models
 */
class ShopifyAuth extends Model
{
    use HasFactory;

    protected $table = "shopify_auth";

    public $fillable = ['shop_name', 'api_key', 'scopes', 'token', 'api_secret_key', "user_id"];

}
