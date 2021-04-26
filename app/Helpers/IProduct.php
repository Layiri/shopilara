<?php


namespace App\Helpers;


interface IProduct
{
    /**
     * Retrieves a single product
     *
     * @param int $product_id
     * @return mixed
     */
    public function getProductById(int $product_id);

    /**
     * Retrieves a list of products
     *
     * @return mixed
     */
    public function getAllProducts();

    /**
     * Retrieves a count of products
     *
     * @return mixed
     */
    public function countOfProducts();

    /**
     * Creates a new product
     *
     * @param array $product
     * @return mixed
     */
    public function createNewProduct(array $product);

    /**
     * Updates a product
     *
     * @param array $product
     * @return mixed
     */
    public function updateProduct(array $product);

    /**
     * Deletes a product
     *
     * @param int $product_id
     * @return mixed
     */
    public function deleteProduct(int $product_id);
}
