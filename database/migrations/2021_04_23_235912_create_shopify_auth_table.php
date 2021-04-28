<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopifyAuthTable extends Migration
{
    const SHOPIFY_AUTH_TABLE = 'shopify_auth';
    const USERS_TABLE = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::SHOPIFY_AUTH_TABLE, function (Blueprint $table) {
            $table->id();
            $table->string("shop_name");
            $table->string("api_key");
            $table->string("api_secret_key");
            $table->string("token")->nullable();
            $table->string("scopes")->default('')->nullable();
            $table->unsignedBigInteger("user_id")->index();
            $table->foreign('user_id')
                ->references('id')
                ->on(self::USERS_TABLE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::SHOPIFY_AUTH_TABLE);
    }
}
