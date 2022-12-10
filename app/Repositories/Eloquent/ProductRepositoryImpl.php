<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductRepositoryImpl implements ProductRepository {
    function getAll()
    {
        Product::all();
    }

    function create(array $detailProduct)
    {
        $product = new Product($detailProduct);
        $product->save();
        return $product;   
    }
}
