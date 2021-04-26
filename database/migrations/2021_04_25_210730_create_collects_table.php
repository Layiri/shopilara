<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectsTable extends Migration
{

    const COLLECTS_TABLE = 'collects';
    const COLLECTIONS_TABLES = 'collections';
    const PRODUCTS_TABLES = 'products';
    const SHOPIFY_STORE_AUTH_TABLE = 'shopify_auth';


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::COLLECTS_TABLE, function (Blueprint $table) {
            $table->unsignedBigInteger('id')->index();
            $table->unsignedBigInteger('collection_id')->index();
            $table->string('created_at'); //TODO:: datetime tz or datetime or string ???????????
            $table->integer('position');
            $table->unsignedBigInteger('product_id')->index();
            $table->string('sort_value');
            $table->string('updated_at'); //TODO:: datetime tz or datetime or string ???????????

            $table->unsignedBigInteger("store_id");

            $table->foreign('collection_id')
                ->references('id')
                ->on(self::SHOPIFY_STORE_AUTH_TABLE);
            $table->foreign('product_id')
                ->references('id')
                ->on(self::SHOPIFY_STORE_AUTH_TABLE);
            $table->foreign('store_id')
                ->references('id')
                ->on(self::SHOPIFY_STORE_AUTH_TABLE);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::COLLECTS_TABLE);
    }
}
