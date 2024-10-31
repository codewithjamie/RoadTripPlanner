<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

/**
 * Class HomeController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home', [
            'title' => 'Home',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Home' => false,
            ],
            'page' => 'resources/views/admin/home.blade.php',
            'controller' => 'app/Http/Controllers/Admin/HomeController.php',
        ]);
    }
}
