<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function show()
    {
        // 取得した値(PostDatum)をビュー「PostData/index」に渡す
        return view('Error/error');
    }
}
