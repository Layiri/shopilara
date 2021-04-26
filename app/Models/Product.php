<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $body_html
 * @property string $handle
 * @property array $images
 * @property array $options
 * @property string $product_type
 * @property string $status
 * @property string $tags
 * @property string $template_suffix
 * @property string $title
 * @property array $variants
 * @property string $vendor
 * @property string $published_scope
 * @property string $created_at
 * @property string $published_at
 * @property string $updated_at
 * @property int $store_id
 *
 *
 * @property ShopifyAuth $store
 *
 * @package App\Models
 */
class Product extends Model
{
    use HasFactory;


    protected $table = 'products';
    public $timestamps = true;

    protected $casts = [
        'price' => 'float'
    ];

    protected $fillable = [
        'name',
        'description',
        'price',
        'created_at'
    ];

}
