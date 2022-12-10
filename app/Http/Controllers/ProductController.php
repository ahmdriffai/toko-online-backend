<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGetAllRequest;
use App\Http\Resources\GetProductResource;
use App\Models\Product;

class ProductController extends BaseController
{
    public function index(ProductGetAllRequest $request) {
        $query = Product::query()->with('category');

        if ($search = $request->query('s')) {
            $query->whereRaw("name LIKE '%" . $search . "%'")
                ->orWhereRaw("description LIKE '%" . $search . "%'");
        }

        if ($sort = $request->query('sort')) {
            $query->orderBy('price', $sort);
        }

        $perPage = $request->query('size', 10);
        $page = $request->query('page', 1);
        $total = $query->count();

        $result = $query->offset(($page - 1 ) * $perPage)->limit($perPage)->get();
        $totalPerPage = $result->count();
        $lastPage = ceil($total / $perPage);

        return response([
            'error' => false,
            'message' => 'success',
            'total' => $total,
            'total_perpage' => $totalPerPage,
            'page' => $page,
            'last_page' => $lastPage,
            'products' => $result,
        ], 200);
    }
}
