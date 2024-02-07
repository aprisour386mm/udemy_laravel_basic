<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        //1対多　親->子
        //1:東京に紐付くショップが表示される
        $shops = Area::find(1)->shops;

        //親 <- 子
        $area = Shop::find(1)->area;


        //多対多
        $routes = shop::find(1)->Routes()->get();

        dd($shops, $area, $routes);
    }
}
