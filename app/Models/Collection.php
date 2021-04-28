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
    public $timestamps = false;

    protected $fillable = [
        'id',
        'body_html',
        'handle',
        'image',
        'sort_order',
        'template_suffix',
        'title',
        'published_scope',
        'published_at',
        'updated_at',
        'store_id'
    ];

    public static function saves($collection, $shopifyAuth)
    {
        $check_collection = Collection::query()->firstWhere("id", "=", $collection['id']);

        if ($check_collection) {
            $check_collection->id = $collection['id'];
            $check_collection->body_html = $collection['body_html'];
            $check_collection->handle = $collection['handle'];
            $check_collection->image = (isset($collection['image'])) ? json_encode($collection['image']) : '{}';
            $check_collection->sort_order = $collection['sort_order'];
            $check_collection->template_suffix = $collection['template_suffix'];
            $check_collection->title = $collection['title'];
            $check_collection->published_scope = $collection['published_scope'];
            $check_collection->published_at = $collection['published_at'];
            $check_collection->updated_at = $collection['updated_at'];
            $check_collection->store_id = $shopifyAuth->id;
            $check_collection->save();
        } else {
            $collection_save = new Collection();
            $collection_save->id = $collection['id'];
            $collection_save->body_html = $collection['body_html'];
            $collection_save->handle = $collection['handle'];
            $collection_save->image = (isset($collection['image'])) ? json_encode($collection['image']) : '{}';
            $collection_save->sort_order = $collection['sort_order'];
            $collection_save->template_suffix = $collection['template_suffix'];
            $collection_save->title = $collection['title'];
            $collection_save->published_scope = $collection['published_scope'];
            $collection_save->published_at = $collection['published_at'];
            $collection_save->updated_at = $collection['updated_at'];
            $collection_save->store_id = $shopifyAuth->id;
            $collection_save->save();
        }

        return true;
    }


}
