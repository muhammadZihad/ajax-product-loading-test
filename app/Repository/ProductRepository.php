<?php

namespace App\Repository;

use App\Exceptions\UnprocessableEntryException;
use App\Models\Product;

class ProductRepository
{
    protected $request;

    protected $limit = 20;

    private $limitLocked = false;

    protected $selectableFields = ['title', 'price', 'type'];

    public function getProducts($filter = [])
    {
    }


    public function getProductsByType($request)
    {
        $this->handleRequest($request);

        if (!$type = $this->request->get('type')) {
            throw new UnprocessableEntryException("Query type filter {\$type} is required.");
        }

        if (!method_exists($this, $type)) {
            throw new UnprocessableEntryException("Undefined filter: $type.");
        }
        return $this->{$type}();
    }


    protected function featuredProducts()
    {
        return Product::select($this->selectableFields)->whereType('featured')
            ->take($this->getLimit())
            ->get();
    }

    protected function bestProducts()
    {
        return Product::select($this->selectableFields)->whereType('best')
            ->take($this->getLimit())
            ->get();
    }

    protected function topProducts()
    {
        return Product::select($this->selectableFields)->whereType('top')
            ->take($this->getLimit())
            ->get();
    }

    protected function randomProducts()
    {
        return Product::select($this->selectableFields)->whereType('random')
            ->take($this->getLimit())
            ->get();
    }


    /**
     * Handles request data before processing
     * @param Request $request
     * @return void
     */
    protected function handleRequest($request)
    {
        $this->request = $request;

        if ($request->get('limit')) {
            $this->setLimit($request->get('limit'));
        }
    }


    /**
     * Get limit of how many products should be fetched
     * @return int
     */
    protected function getLimit()
    {
        return $this->limit;
    }


    /**
     * Set how many products should be fetched
     * @param int $limit
     * @return ProductRepository
     */
    public function setLimit($limit)
    {
        if (!$this->limitLocked) {
            $this->limit = $limit;
            $this->limitLocked = true;
        }
        return $this;
    }

    /**
     * Set selectable fields
     * @param array $fields ['*'] = all
     * @return ProductRepository
     */
    public function setSelectable($array)
    {
        $this->selectableFields = $array;
        return $this;
    }

    /**
     * Get selectable fields
     * @return array
     */
    protected function getSelectables()
    {
        return $this->selectableFields;
    }
}