<?php
/**
 * Created by PhpStorm.
 * User: tomoya_suzuki
 * Date: 2018-11-25
 * Time: 18:15
 */

namespace App\Http\Controllers\Offer;


use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getList()
    {
        // TODO offer list の取得と表示をかく
        return view('offer_list');
    }
}