<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contribution;
use App\Models\DiscordUser;
use App\Models\GoldContribution;
use App\Models\ItemContribution;
use App\Models\Resource;
use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $all_squad = Role::whereNotIn('id', [1, 2, 3, 4])->with('user')->get();
        $all_categories = Category::with('resource')->get();
        $all_resources = Resource::with('category', 'rarity', 'tier', 'source')->get();

        return Inertia::render('Contribution/Contribution', [
            'all_squad' => $all_squad,
            'all_categories' => $all_categories,
            'all_resources' => $all_resources,
        ]);
    }

    public function create_contribution_gold(Request $request)
    {
        if ($request['type_contribution'] === 'guild') {

            $contribution_valid = $request->validate([
                'start_on' => 'required|date',
                'finished_it' => 'required|date|after:start_on',
            ]);

            $contribution = Contribution::create($contribution_valid);

            $all_discord_user = DiscordUser::all();

            foreach ($all_discord_user as $discord_user) {
                GoldContribution::create([
                    'contribution_id' => $contribution->id,
                    'discord_user_id' => $discord_user->id,
                    'quantity_gold_request' => $request['quantity'],
                ]);
            }
        }

        return back();
    }

    public function create_contribution_item(Request $request)
    {
        $contribution_valid = $request->validate([
            'start_on' => 'required|date',
            'finished_it' => 'required|date|after:start_on',
        ]);

        $contribution = Contribution::create($contribution_valid);

        $all_discord_user = DiscordUser::all();

        for ($i = 0; $i < count($request['item_id']); $i++) {

            foreach ($all_discord_user as $discord_user) {
                ItemContribution::create([
                    'contribution_id' => $contribution->id,
                    'discord_user_id' => $discord_user->id,
                    'resource_id' => $request['item_id'][$i],
                    'quantity_resource_request' => $request['quantity'][$i],
                ]);
            }

        }
        return back();
    }
}
