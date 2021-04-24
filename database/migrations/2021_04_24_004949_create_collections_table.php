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
            $table->string("body_html"); // description
            $table->string("handle");
            $table->json("image");
            $table->unsignedBigInteger("id");
            $table->string("published_at"); //TODO:: datetime tz or datetime or string ???????????
            $table->string("published_scope");
            $table->string("sort_order");
            $table->string("template_suffix");
            $table->string("title");
            $table->string("updated_at");//TODO:: datetime tz or datetime or string ???????????
            $table->unsignedBigInteger("store_id");
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
