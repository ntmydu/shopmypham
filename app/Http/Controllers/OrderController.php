<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Menu;
use App\Models\Slide;
use App\Models\Upload;


class OrderController extends Controller
{
    public function index(Request $request)
    {

        $menus = Menu::all();
        // $slides = Slide::orderBy('id', 'DESC')->where('status', '1')->take(4)->get();
        $slides =  Slide::orderBy('id', 'DESC')->get();
        $products = Product::get();
        $carts = session()->get('cart', []);

        $totalAmount = 0;

        // Tính tổng tiền cho giỏ hàng
        if (!is_null($carts)) {
            foreach ($carts as $cartItem) {
                $totalAmount += $cartItem['price'] * $cartItem['quantity'];
            }
        }
        return view('fontend.checkout.order', [
            'menus' => $menus,
            'products' => $products,
            'slides' => $slides,
            'totalAmount' => $totalAmount
        ]);
    }
    public function showConfirm(Request $request)
    {
        $menus = Menu::all();
        $order = session()->get('orderData', []);
        $orderData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'note' => $request->input('note')
        ];
        session()->put('order', $orderData);




        // Chuyển hướng đến trang xác nhận
        return view('fontend.checkout.confirm', [
            'menus' => $menus,
            'order' => $order
        ]);
    }
    public function reviewOrder(Request $request)
    {
        // Lấy thông tin từ session
        $order = session()->get('order', []);
        return view('order.review', [
            'order' => $order
        ]);
    }
}