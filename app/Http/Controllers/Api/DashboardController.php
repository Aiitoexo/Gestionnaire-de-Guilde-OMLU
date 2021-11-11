<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contribution;
use App\Models\DiscordUser;
use App\Models\DiscordUserRole;
use App\Models\Gold;
use App\Models\GoldContribution;
use App\Models\ItemContribution;
use App\Models\Resource;
use App\Models\Role;
use App\Models\User;
use App\Models\VoiceChannelTemp;
use App\Services\GoldService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function addGold(GoldService $goldService, Request $request)
    {
        $quantity = $request['quantity'];
        $user_id = $request['user'];

        $user = User::where('discord', '=', $user_id)->first();

        $goldService->addGold($quantity, $user->id);

        $gold = Gold::all()->last();

        return ['success' => true, 'message' => sprintf("%s: Vous venez d'ajouter %s gold en BDG le solde actuelle est de %s", $user->name, $quantity, $gold->gold)];
    }

    public function reduceGold(GoldService $goldService, Request $request)
    {
        $quantity = $request['quantity'];
        $user_id = $request['user'];

        $user = User::where('discord', '=', $user_id)->first();

        $goldService->reduceGold($quantity, $user->id);

        $gold = Gold::all()->last();

        return ['success' => true, 'message' => sprintf("%s: Vous venez de retirer %s gold en BDG le solde actuelle est de %s", $user->name, $quantity, $gold->gold)];
    }

    public function solde()
    {
        $gold = Gold::all()->last();

        return ['message' => sprintf("Le solde actuelle de la BDG est de %s", $gold->gold)];
    }

    public function resourceCategory()
    {
        $all_cat = Category::all()->toJson();

        return $all_cat;
    }

    public function itemsCategory(Request $request)
    {
        $category = $request['category'];

        $all_items = Resource::where('category_id', $category)->get()->toJson();

        return $all_items;
    }

    public function addDiscordUser(Request $request)
    {
        $all_users = $request['all_users'];

        foreach ($all_users as $user) {
            $exists = DiscordUser::where('id_discord_user', $user[1])->exists();

            if (!$exists) {

                $discord_user = DiscordUser::create([
                    'pseudo' => str_contains($user[0], '[OMLU] ') ? substr($user[0], 6) : $user[0],
                    'id_discord_user' => $user[1],
                ]);

                foreach ($user[2] as $id) {
                    $role_exists = Role::where('id_discord_role', $id)->exists();

                    if ($role_exists) {

                        $role_id = Role::where('id_discord_role', $id)->get();

                        $all_squad = Role::whereNotIn('id', [1, 2, 3])->get();

                        foreach ($all_squad as $squad) {
                            if ($squad->id === $role_id[0]->id) {
                                $discord_user->squad_id = $squad->id;
                                $discord_user->save();
                            }
                        }

                        DiscordUserRole::create([
                            'discord_user_id' => $discord_user->id,
                            'role_id' => $role_id[0]->id,
                        ]);
                    }
                }
            } elseif ($exists === true) {
                $discord_user = DiscordUser::where('id_discord_user', $user[1])->get();

                $discord_user[0]->pseudo = str_contains($user[0], '[OMLU] ') ? substr($user[0], 6) : $user[0];
                $discord_user[0]->id_discord_user = $user[1];

                $discord_user[0]->save();

                $all_roles = DiscordUserRole::where('discord_user_id', $discord_user[0]->id)->get();

                foreach ($all_roles as $role) {
                    $role->delete();
                }

                foreach ($user[2] as $id) {
                    $role_exists = Role::where('id_discord_role', $id)->exists();

                    if ($role_exists) {
                        $role_id = Role::where('id_discord_role', $id)->get();

                        $all_squad = Role::whereNotIn('id', [1, 2, 3])->get();

                        foreach ($all_squad as $squad) {
                            if ($squad->id === $role_id[0]->id) {
                                $discord_user[0]->squad_id = $squad->id;
                                $discord_user[0]->save();
                            }
                        }

                        DiscordUserRole::create([
                            'discord_user_id' => $discord_user[0]->id,
                            'role_id' => $role_id[0]->id,
                        ]);
                    }
                }
            }
        }

        return ['message' => 'Tous les utilisateurs on étais ajouté et mis à jour !'];
    }

    public function displayContribution()
    {
        $contribution_gold = DB::table('gold_contributions')
            ->join('contributions', 'gold_contributions.contribution_id', '=', 'contributions.id')
            ->join('discord_users', 'gold_contributions.discord_user_id', '=', 'discord_users.id')
            ->join('roles', 'discord_users.squad_id', '=', 'roles.id')
            ->get();

        $contribution_item = DB::table('item_contributions')
            ->join('contributions', 'item_contributions.contribution_id', '=', 'contributions.id')
            ->join('resources', 'item_contributions.resource_id', '=', 'resources.id')
            ->join('discord_users', 'item_contributions.discord_user_id', '=', 'discord_users.id')
            ->join('roles', 'discord_users.squad_id', '=', 'roles.id')
            ->get();

        return collect()->merge($contribution_gold)->merge($contribution_item);
    }
}
