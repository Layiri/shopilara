<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "collections".

 * @property int $id
 * @property string $body_html
 * @property string $handle
 * @property array $image
 * @property string $sort_order
 * @property string $template_suffix
 * @property string $title
 * @property string $published_scope
 * @property string $published_at
 * @property string $updated_at
 * @property int $store_id
 *
 * @property ShopifyAuth $store
 *
 * @package App\Models
 */
class Collection extends Model
{
    use HasFactory;



    protected $table = 'collections';
    public $timestamps = true;

    protected $casts = [
        'price' => 'float'
    ];

    protected $fillable=[
        'name',
        'description',
        'price',
        'created_at'
    ];
}
