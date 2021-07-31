<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stockProduct()
    {
        $products = Product::latest()->get();
        return view('admin.product.product-stock-manage', compact('products'));
    }
}
