<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class ResepController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('menus.index', ['menus'=>$menu]);
    }
}
