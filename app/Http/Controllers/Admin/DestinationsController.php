<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Models\Location;

/**
 * Class DestinationsController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DestinationsController extends Controller
{
    public function index()
    {
        $data = Location::latest()->paginate(8);

        return view('admin.destinations', [
            'title' => 'Destinations',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Destinations' => false,
            ],
            'page' => 'resources/views/admin/destinations.blade.php',
            'controller' => 'app/Http/Controllers/Admin/DestinationsController.php',
        ], compact('data'));
    }
}
