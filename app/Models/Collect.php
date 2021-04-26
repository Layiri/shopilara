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
}
