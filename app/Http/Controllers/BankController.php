<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gold;
use App\Models\HistoryBankGold;
use App\Models\HistoryBankResource;
use App\Models\Resource;
use App\Services\GoldService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $all_categories = Category::with('resource')->get();
        $all_resources = Resource::with('category', 'rarity', 'tier', 'source')->get();
        $all_history_resource = HistoryBankResource::with('user', 'resource')->orderBy('created_at', 'DESC')->get();
        $all_history_gold = HistoryBankGold::with('user')->orderBy('created_at', 'DESC')->get();
        $gold = Gold::all()->last();

        return Inertia::render('Bank/Bank', [
            'all_resources' => $all_resources,
            'all_categories' => $all_categories,
            'all_history_resource' => $all_history_resource,
            'all_history_gold' => $all_history_gold,
            'gold' => $gold,
        ]);
    }

    public function remove(Request $request)
    {
        date_default_timezone_set('Europe/Paris');

        $resource = Resource::findOrFail($request['id']);

        $old_resource = $resource->quantity;

        if ($resource->quantity > 0) {
            $resource->quantity -= $request['quantity'];
            if ($resource->quantity < 0) {
                $resource->quantity = 0;
            }
            $resource->save();

            HistoryBankResource::create([
                'user_id' => Auth::user()->id,
                'resource_id' => $resource->id,
                'quantity' => $old_resource,
                'add' => null,
                'reduce' => $request['quantity'],
                'new_quantity' => $resource->quantity,
                'date' => utf8_encode(strftime('%d.%m.%Y, %H:%M'))
            ]);
        }

        return back();
    }

    public function add(Request $request)
    {
        date_default_timezone_set('Europe/Paris');

        $resource = Resource::findOrFail($request['id']);

        $old_resource = $resource->quantity;

        if ($resource->quantity >= 0) {
            $resource->quantity += $request['quantity'];
            $resource->save();

            HistoryBankResource::create([
                'user_id' => Auth::user()->id,
                'resource_id' => $resource->id,
                'quantity' => $old_resource,
                'add' => $request['quantity'],
                'reduce' => null,
                'new_quantity' => $resource->quantity,
                'date' => utf8_encode(strftime('%d.%m.%Y, %H:%M'))
            ]);
        }

        return back();
    }

    public function addGold(GoldService $goldService, Request $request)
    {
        $quantity = $request['quantity'];

        $user = Auth::user()->id;

        $goldService->addGold($quantity, $user);

        return back();
    }

    public function reduceGold(GoldService $goldService, Request $request)
    {
        $quantity = $request['quantity'];

        $user = Auth::user()->id;

        $goldService->reduceGold($quantity, $user);

        return back();
    }

    public function yolo()
    {
        Http::post('https://discord.com/api/webhooks/888067042194882560/I3ZMuga_sdolMlx3xuD7TUc8xdgT4jZsu4mEXh--1AT8Z5YqeAQqTFosK2YvcWVgBrlt', [
            "content" => "!spam test",
            "embeds" => null
        ]);

        return back();
    }

}
