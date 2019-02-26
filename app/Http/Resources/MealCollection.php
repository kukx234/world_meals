<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MealCollection extends ResourceCollection
{
    
    private $meta;

    public function __construct($resource)
    {
        $this->meta = [
            'currentPage' => $resource->currentPage(),
            'totalItems' => $resource->total(),
            'itemsPerPage' =>(int)$resource->perPage(),
            'totalPages' => $resource->lastPage(),
        ];

        $resource = $resource->getCollection();
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'meta' => $this->meta,
            'data' => $this->collection,
        ];
    }

    
}
