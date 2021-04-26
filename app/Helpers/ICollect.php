<?php


namespace App\Helpers;


interface ICollect
{
    /**
     * Adds a product to a custom collection
     *
     * @param int $product_id
     * @param int $collection_id
     * @return mixed
     */
    public function addsProductToCustomCollection(int $product_id, int $collection_id);

    /**
     * Removes a product from a collection
     *
     * @param int $collect_id
     * @return mixed
     */
    public function removeProductsFromCollection(int $collect_id);

    /**
     * Retrieves a list of collects
     *
     * @return mixed
     */
    public function getAllCollects();

    /**
     * Retrieves a count of collects
     *
     * @return mixed
     */
    public function countOfCollect();

    /**
     * Retrieves a specific collect by its ID
     *
     * @param int $collect_id
     * @return mixed
     */
    public function getCollectById(int $collect_id);
}
