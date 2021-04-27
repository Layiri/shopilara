<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "collects".
 * @property int $id
 * @property int $collection_id
 * @property string $created_at
 * @property int $position
 * @property int $product_id
 * @property string $sort_value
 * @property string $updated_at
 * @property int $store_id
 *
 *
 * @property Collection $collection
 * @property Product $product
 * @property ShopifyAuth $store
 *
 * @package App\Models
 */
class Collect extends Model
{
    use HasFactory;

    protected $table = 'collects';

    protected $fillable = [
        'id',
        'collection_id',
        'created_at',
        'position',
        'product_id',
        'sort_value',
        'updated_at',
        'store_id'
    ];

    public static function saves($products, $shopifyAuth)
    {
        foreach ($products as $product) {
            $check_product = Product::query()->firstWhere("id", "=", $product->id);
            if ($check_product) {
                $check_product->body_html = $product->body_html;
                $check_product->handle = $product->handle;
                $check_product->images = json_encode($product->images);
                $check_product->image = json_encode($product->images);
                $check_product->options = json_encode($product->options);
                $check_product->product_type = $product->product_type;
                $check_product->status = (isset($product->status)) ? $product->status : '1';
                $check_product->tags = $product->tags;
                $check_product->template_suffix = $product->template_suffix;
                $check_product->title = $product->title;
                $check_product->variants = json_encode($product->variants);
                $check_product->vendor = $product->vendor;
                $check_product->published_scope = $product->published_scope;
                $check_product->created_at = $product->created_at;
                $check_product->published_at = $product->published_at;
                $check_product->updated_at = $product->updated_at;
                $check_product->store_id = $shopifyAuth->id;
                $check_product->save();
            } else {
                $product_save = new Product();
                $product_save->id = $product->id;
                $product_save->body_html = $product->body_html;
                $product_save->handle = $product->handle;
                $product_save->images = json_encode($product->images);
                $product_save->image = json_encode($product->images);
                $product_save->options = json_encode($product->options);
                $product_save->product_type = $product->product_type;
                $product_save->status = (isset($product->status)) ? $product->status : '1';
                $product_save->tags = $product->tags;
                $product_save->template_suffix = $product->template_suffix;
                $product_save->title = $product->title;
                $product_save->variants = json_encode($product->variants);
                $product_save->vendor = $product->vendor;
                $product_save->published_scope = $product->published_scope;
                $product_save->created_at = $product->created_at;
                $product_save->published_at = $product->published_at;
                $product_save->updated_at = $product->updated_at;
                $product_save->store_id = $shopifyAuth->id;
                $product_save->save();
            }
        }

        return true;
    }


}
