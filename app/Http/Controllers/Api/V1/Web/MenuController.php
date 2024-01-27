<?php

namespace App\Http\Controllers\Api\V1\Web;

use App\Models\Menu;
use App\Http\Resources\MenuResource;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $menus = Menu::oldest()->get();

        //return with Api Resource
        return new MenuResource(true, 'List Data Menus', $menus);
    }
}
