<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

/**
 * Class UsersController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users', [
            'title' => 'Users',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Users' => false,
            ],
            'page' => 'resources/views/admin/users.blade.php',
            'controller' => 'app/Http/Controllers/Admin/UsersController.php',
        ]);
    }
}
