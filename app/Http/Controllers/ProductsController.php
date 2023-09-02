<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function get_price($name, $qty)
    {
        $price = 0;
        if ($name === 'iphone') {
            $price =  50 * $qty;
        }
        elseif ($name ===  "samsung") {
            $price =  30 * $qty;
        }
        return view('product',[
            'name' =>$name,
            'price' => $price
        ]);
    }
}
