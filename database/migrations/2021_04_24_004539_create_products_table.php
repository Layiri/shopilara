<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    const PRODUCTS_TABLE = 'products';
    const SHOPIFY_STORE_AUTH_TABLE = 'shopify_auth';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::PRODUCTS_TABLE, function (Blueprint $table) {

            $table->unsignedBigInteger("id")->index();
            $table->string("body_html"); // description
            $table->string("handle");
            $table->json("images");
            $table->json("options");
            $table->string("product_type");
            $table->string("status");
            $table->string("tags");
            $table->string("template_suffix");
            $table->string("title");
            $table->json("variants"); // json
            $table->string("vendor");

            $table->string("published_scope");
            $table->string("created_at"); //TODO:: datetime tz or datetime or string ???????????
            $table->string("published_at"); //TODO:: datetime tz or datetime or string ???????????
            $table->string("updated_at");//TODO:: datetime tz or datetime or string ???????????

            $table->unsignedBigInteger("store_id")->index();
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
        Schema::dropIfExists(self::PRODUCTS_TABLE);
    }
}
