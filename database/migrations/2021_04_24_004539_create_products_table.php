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

            $table->unsignedBigInteger("id")->primary();
            $table->text("body_html")->nullable(); // description
            $table->string("handle")->nullable();
            $table->json("images")->nullable(); // json
            $table->json("image")->nullable(); // json
            $table->json("options")->nullable(); // json
            $table->string("product_type")->nullable();
            $table->string("status")->nullable();
            $table->string("tags")->nullable();
            $table->string("template_suffix")->nullable();
            $table->string("title")->nullable();
            $table->json("variants")->nullable(); // json
            $table->string("vendor")->nullable();

            $table->string("published_scope")->nullable();
            $table->string("created_at"); //TODO:: datetime tz or datetime or string ???????????
            $table->string("published_at")->nullable(); //TODO:: datetime tz or datetime or string ???????????
            $table->string("updated_at")->nullable();//TODO:: datetime tz or datetime or string ???????????

            $table->unsignedBigInteger("store_id")->index()->nullable();
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
