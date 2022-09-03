<?php

namespace App\Repository;

use App\Exceptions\UnprocessableEntryException;

class ProductRepository
{
    protected $request;

    public function getProducts($filter = [])
    {
    }


    public function getProductsByType($request)
    {
        $this->handleRequest($request);

        if (!$type = $this->request->get('type')) {
            throw new UnprocessableEntryException("Query type filter {\$type} is required.");
        }

        if (method_exists($this, $type)) {
            throw new UnprocessableEntryException("Undefined filter: $type.");
        }
        return $this->{$type}();
    }

    protected function handleRequest($request)
    {
        $this->request = $request;
    }
}