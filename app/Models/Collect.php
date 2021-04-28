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

    public static function saves($collects, $shopifyAuth)
    {
        foreach ($collects as $collect) {
            $check_collect = Collect::query()->firstWhere("id", "=", $collect['id']);
            if ($check_collect) {
                $check_collect->id = $collect['id'];
                $check_collect->collection_id = $collect['collection_id'];
                $check_collect->created_at = $collect['created_at'];
                $check_collect->position = $collect['position'];
                $check_collect->product_id = $collect['product_id'];
                $check_collect->sort_value = $collect['sort_value'];
                $check_collect->updated_at = $collect['updated_at'];
                $check_collect->store_id = $shopifyAuth->id;
                $check_collect->save();
            } else {
                $collect_save = new Collect();
                $collect_save->id = $collect['id'];
                $collect_save->collection_id = $collect['collection_id'];
                $collect_save->created_at = $collect['created_at'];
                $collect_save->position = $collect['position'];
                $collect_save->product_id = $collect['product_id'];
                $collect_save->sort_value = $collect['sort_value'];
                $collect_save->updated_at = $collect['updated_at'];
                $collect_save->store_id = $shopifyAuth->id;
                $collect_save->save();
            }
        }

        return true;
    }


}
