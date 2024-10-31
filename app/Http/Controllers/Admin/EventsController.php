<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

/**
 * Class EventsController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EventsController extends Controller
{
    public function index()
    {
        return view('admin.events', [
            'title' => 'Events',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Events' => false,
            ],
            'page' => 'resources/views/admin/events.blade.php',
            'controller' => 'app/Http/Controllers/Admin/EventsController.php',
        ]);
    }
}
