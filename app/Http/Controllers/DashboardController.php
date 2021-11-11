<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\DiscordUser;
use App\Models\GoldContribution;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $all_main_roles = Role::whereIn('id', [1, 2, 3])->with('user')->get();
        $all_discord_users = DiscordUser::with('squad', 'classe', 'first_weapon', 'second_weapon', 'harvest', 'transformation')->get();
        $contribution_active = Contribution::with('gold_contribution', 'item_contribution')->where('active', '=', true)->get();

        return Inertia::render('Dashboard/Dashboard', [
            'all_main_roles' => $all_main_roles,
            'all_discord_users' => $all_discord_users,
            'contribution_active' => $contribution_active,
        ]);
    }

    public function receivedContributionGold(Request $request)
    {
        $contribution = GoldContribution::where('discord_user_id', $request['id'])->get();

        $old_contribution = $contribution[0]->quantity_gold_received;

        $contribution[0]->quantity_gold_received = $old_contribution + $request['quantity'];

        $contribution[0]->save();

        if ($contribution[0]->quantity_gold_received >= $contribution[0]->quantity_gold_request) {
            $contribution[0]->contribution_complete = true;
            $contribution[0]->save();
        }

        return back();
    }
}
