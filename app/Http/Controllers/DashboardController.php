<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $all_discord_users = Role::whereIn('id', [1,2,3])->with('user')->get();

        return Inertia::render('Dashboard/Dashboard', [
            'all_discord_users' => $all_discord_users,
        ]);
    }
}
