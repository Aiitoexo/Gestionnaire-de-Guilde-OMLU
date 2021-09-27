<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\DiscordUser;
use App\Models\JobHarvest;
use App\Models\JobTransformation;
use App\Models\Role;
use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;

class SquadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $all_squad = Role::whereNotIn('id', [1, 2, 3])->with('user')->get();
        $all_weapons = Weapon::all();
        $all_job_harvests = JobHarvest::all();
        $all_job_transformation = JobTransformation::all();
        $all_classes = Classe::all();

        return Inertia::render('Squad/Squad', [
            'all_squad' => $all_squad,
            'all_weapons' => $all_weapons,
            'all_job_harvests' => $all_job_harvests,
            'all_job_transformation' => $all_job_transformation,
            'all_classes' => $all_classes,
        ]);
    }

    public function selectFirstWeapon(Request $request)
    {
        $user = DiscordUser::findOrFail($request['user_id']);

        $user->first_weapon_id = $request['first_weapon_id'];
        $user->save();

        return back();
    }

    public function selectSecondWeapon(Request $request)
    {
        $user = DiscordUser::findOrFail($request['user_id']);

        $user->second_weapon_id = $request['second_weapon_id'];
        $user->save();

        return back();
    }

    public function selectClasse(Request $request)
    {
        $user = DiscordUser::findOrFail($request['user_id']);

        $user->classe_id = $request['classe_id'];
        $user->save();

        return back();
    }

    public function selectJobHarvest(Request $request)
    {
        $user = DiscordUser::findOrFail($request['user_id']);

        $user->job_harvest_id = $request['job_harvest_id'];
        $user->save();

        return back();
    }

    public function selectJobTransformation(Request $request)
    {
        $user = DiscordUser::findOrFail($request['user_id']);

        $user->job_transformation_id = $request['job_transformation_id'];
        $user->save();

        return back();
    }

    public function selectStartHour(Request $request)
    {
        $squad = Role::findOrFail($request['squad_id']);

        $squad->start_hour = $request['start_hour'];
        $squad->save();

        return back();
    }

    public function selectEndHour(Request $request)
    {
        $user = Role::findOrFail($request['squad_id']);

        $user->end_hour = $request['end_hour'];
        $user->save();

        return back();
    }

    public function reloadUser()
    {
        Http::post('https://discord.com/api/webhooks/888067042194882560/I3ZMuga_sdolMlx3xuD7TUc8xdgT4jZsu4mEXh--1AT8Z5YqeAQqTFosK2YvcWVgBrlt', [
            "content" => "!add_users_api",
            "embeds" => null
        ]);

        return back();
    }
}
