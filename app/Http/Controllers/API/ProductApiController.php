<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterForCatalogueRequest;
use App\Http\Resources\ProductShortResource;
use App\Services\DTO\FilterForCatalogueDTO;
use App\Services\ProductService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductApiController extends Controller
{
    public function getProducts(FilterForCatalogueRequest $request, ProductService $service): AnonymousResourceCollection
    {
        $DTO = new FilterForCatalogueDTO(
            $request->getCategory(),
            $request->getPriceMin(),
            $request->getPriceMax(),
            $request->getIsVegan(),
        );

        return ProductShortResource::collection($service->getProductsList($DTO));
    }
}
