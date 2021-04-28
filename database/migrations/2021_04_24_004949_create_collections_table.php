<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    const COLLECTIONS_TABLE = 'collections';
    const SHOPIFY_STORE_AUTH_TABLE = 'shopify_auth';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::COLLECTIONS_TABLE, function (Blueprint $table) {

            $table->unsignedBigInteger("id")->primary();
            $table->string("body_html")->nullable(); // description
            $table->string("handle")->nullable();
            $table->json("image")->nullable();
            $table->string("sort_order")->nullable();
            $table->string("template_suffix")->nullable();
            $table->string("title")->nullable();
            $table->string("published_scope")->nullable();
            $table->string("published_at")->nullable(); //TODO:: datetime tz or datetime or string ???????????
            $table->string("updated_at")->nullable();//TODO:: datetime tz or datetime or string ???????????
            $table->unsignedBigInteger("store_id")->nullable();
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
        Schema::dropIfExists(self::COLLECTIONS_TABLE);
    }
}
