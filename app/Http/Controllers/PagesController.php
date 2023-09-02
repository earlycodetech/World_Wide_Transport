<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('class');
    }


    public function get_user()
    {
        $name = "John Snow";

        if ($name === "John Snow") {
            $message =  "How are you";
        } else {
            $message = "Get me water";
        }


        // return view('show_user')->with('msg', $message);
        // return  view('show_user', compact('message'));

        return view('show_user', [
            'user' => $name,
            'msg' => $message
        ]);
    }


    public function get_info($name, $age)
    {
        return $name . ' ' . $age;
    }




    public function shop()
    {
        $like = true;
        return view('shop', compact('like'));
    }
}
