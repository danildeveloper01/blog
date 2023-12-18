<?php

namespace App\Http\Controllers\Profile\Main;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
    public function __invoke()
    {

        return view('profile.main.index');
    }

}
