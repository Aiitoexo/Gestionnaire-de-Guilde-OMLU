<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gold;
use App\Models\Resource;
use App\Models\User;
use App\Services\GoldService;
use Illuminate\Http\Request;

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
}
