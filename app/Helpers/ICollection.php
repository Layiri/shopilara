<?php


namespace App\Helpers;


interface ICollection
{
    /**
     * Retrieves a single collection
     *
     * @param int $collection_id
     * @return mixed
     */
    public function getCollectionById(int $collection_id);

    /**
     * Retrieve a list of products belonging to a collection
     *
     * @param int $collection_id
     * @return mixed
     */
    public function getAllProductsByCollectionById(int $collection_id);
}
