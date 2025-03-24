<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Menu;
use App\Models\Upload;

class ProductFeController extends Controller
{
    public function index($id)
    {
        $product = Product::where('id', $id)->first();
        $menus = Menu::orderBy('name', 'ASC')->select('id', 'name')->get();

        $images = Upload::where('product_id', $product->id)->get();
        return view('fontend.product.detail', [
            'product' => $product,
            'menus' => $menus,
            'images' => $images
        ]);
    }
    public function show($id)
    {
        $menus = Menu::all();
        $menu = Menu::find($id);
        $products = Product::where('menu_id', $id)->get();
        $images = Upload::all();
        return view('fontend.product.list', [
            'products' => $products,
            'menus' => $menus,
            'menu' =>  $menu,
            'images' => $images
        ]);
    }
}
