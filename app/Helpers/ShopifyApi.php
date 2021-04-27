<?php


namespace App\Helpers;


use App\Models\ShopifyAuth;

/**
 * Class ShopifyApi
 * @package App\Helpers
 *
 * @property ShopifyAuth $shopify
 * @author Layiri Batiene
 * @version 0.1
 */
class ShopifyApi extends CallShopifyApi implements IProduct, ICollect, ICollection
{
    /**
     * @var ShopifyAuth
     */
    public $shopify;

    /**
     * Retrieves a single product
     *
     * @param int $product_id
     * @return bool|mixed
     */
    public function getProductById(int $product_id)
    {
        $result = self::shopify_call($this->shopify, "/admin/api/2021-07/products/" . $product_id . ".json", [], 'GET');
        if ($result['response']) {
            $products = json_decode($results['response'], TRUE);

            return $result['response'];
        } else {
            return false;
        }
    }

    /**
     * Retrieves a list of products
     *
     * @return bool|mixed
     */
    public function getAllProducts()
    {
        $results = self::shopify_call($this->shopify, "/admin/products.json", [], 'GET');
        if ($results['headers']['status'] == "HTTP/2 200 \r") {
            return json_decode($results['response'])->products;
        } else {
            return false;
        }
    }

    /**
     * Retrieves a count of products
     *
     * @return bool|mixed
     */
    public function countOfProducts()
    {
        $count = self::shopify_call($this->shopify, "/admin/api/2021-04/products/count.json", [], 'GET');
        if ($count['headers']['status'] == "HTTP/2 200 \r") {
            return json_decode($count['response'], TRUE);
        } else {
            return false;
        }
    }

    /**
     * Creates a new product
     *
     * @param array $product
     * @return bool
     */
    public function createNewProduct(array $product)
    {

        $query = array(
            "product" => $product
        );
        $result = self::shopify_call($this->shopify, "/admin/api/2021-07/products.json", $query, 'POST');
        if ($result['headers']['status'] == "HTTP/2 200 \r") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Updates a product
     *
     * @param array $product
     * @return bool
     */
    public function updateProduct(array $product)
    {
        $query = array(
            "product" => $product
        );
        $result = self::shopify_call($this->shopify, "/admin/products/" . $product['id'] . ".json", $query, 'PUT');
        if ($result['headers']['status'] == "HTTP/2 200 \r") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Deletes a product
     *
     * @param int $product_id
     * @return bool
     */
    public function deleteProduct(int $product_id)
    {
        $result = self::shopify_call($this->shopify, "/admin/api/2021-07/products/" . $product_id . ".json", [], 'DELETE');
        if ($result['headers']['status'] == "HTTP/2 200 \r") {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Adds a product to a custom collection
     *
     * @param int $product_id
     * @param int $collection_id
     * @return bool|mixed
     */
    public function addsProductToCustomCollection(int $product_id, int $collection_id)
    {
        $query = array(
            "collect" => [
                "product_id" => $product_id,
                "collection_id" => $collection_id
            ]
        );
        $result = self::shopify_call($this->shopify, "admin/api/2021-04/collects", $query, 'POST');
        if ($result['headers']['status'] == "HTTP/2 200 \r") {
            $collect = json_decode($result['response'], TRUE);
            return $collect['collect'];
        } else {
            return false;
        }
    }

    /**
     * Removes a product from a collection
     *
     * @param int $collect_id
     * @return bool|mixed
     */
    public function removeProductsFromCollection(int $collect_id)
    {
        $result = self::shopify_call($this->shopify, "/admin/api/2021-04/collects/" . $collect_id . ".json", [], 'DELETE');
        if ($result['headers']['status'] == "HTTP/2 200 \r") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Retrieves a list of collects
     *
     * @return bool|mixed
     */
    public function getAllCollects()
    {
        $results = self::shopify_call($this->shopify, "/admin/api/2021-04/collects.json", [], 'GET');

        if ($results['headers']['status'] == "HTTP/2 200 \r") {
            $collects = json_decode($results['response'], TRUE);
            return $collects['collects'];
        } else {
            return false;
        }
    }


    /**
     * Retrieves a count of collects
     *
     * @return bool|mixed
     */
    public function countOfCollect()
    {
        $result = self::shopify_call($this->shopify, "/admin/api/2021-04/collects/count.json", [], 'GET');
        if ($result['response']) {
            $count = json_decode($result['response'], TRUE);
            return $count['count'];
        } else {
            return false;
        }

    }

    /**
     * Retrieves a specific collect by its ID
     *
     * @param int $collect_id
     * @return mixed|void
     */
    public function getCollectById(int $collect_id)
    {
        $result = self::shopify_call($this->shopify, "/admin/api/2021-04/collects/" . $collect_id . ".json", [], 'GET');
        if ($result['response']) {
            $collect = json_decode($result['response'], true);
            return $collect['collect'];
        } else {
            return false;
        }
    }


    /**
     * Retrieves a single collection
     *
     * @param int $collection_id
     * @return bool|mixed
     */
    public function getCollectionById(int $collection_id)
    {
        $collection = self::shopify_call($this->shopify, "/admin/api/2021-04/collections/" . $collection_id . ".json", [], 'GET');
        if ($collection['response']) {
            return $collection['response'];

            return $collection['response'];

        } else {
            return false;
        }
    }


    /**
     * Retrieve a list of products belonging to a collection
     * @param int $collection_id
     * @return bool|mixed
     */
    public function getAllProductsByCollectionById(int $collection_id)
    {
        $collection = self::shopify_call($this->shopify, "/admin/api/2021-04/collections/" . $collection_id . "/products.json", [], 'GET');
        if ($collection['response']) {
            return $collection['response'];
        } else {
            return false;
        }
    }

    public function generateToken()
    {
        $query = array(
            "client_id" => $this->shopify->api_key,
            "client_secret" => $this->shopify->shared_secret,
            "code" => $this->shopify->code
        );
        $result = self::shopify_call($this->shopify, "/admin/oauth/access_token", $query);

        dd($result['response']);
        if ($result) {
            $result = json_decode($result, true);
            return $result['access_token'];
        } else {
            return false;
        }
    }

}
