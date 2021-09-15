<?php

namespace App\Services;

use App\Models\Gold;
use App\Models\HistoryBankGold;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoldService
{
    public function addGold(int $quantity, $user)
    {
        $gold = Gold::all()->last();

        $old_resource = $gold->gold;

        if ($gold->gold >= 0) {
            $new_gold = $quantity;

            $new_gold_save =  Gold::create([
                'gold' => $old_resource + $new_gold
            ]);

            HistoryBankGold::create([
                'user_id' => $user,
                'quantity' => $old_resource,
                'add' => $quantity,
                'reduce' => null,
                'new_quantity' => $new_gold_save->gold,
                'date' => now()
            ]);
        }
    }

    public function reduceGold(int $quantity, $user)
    {
        $gold = Gold::all()->last();

        $old_resource = $gold->gold;

        if ($gold->gold > 0) {
            $new_gold = $old_resource - $quantity;

            if ($new_gold < 0) {
                $new_gold = 0;
            };

            $new_gold_save =  Gold::create([
                'gold' => $new_gold
            ]);

            HistoryBankGold::create([
                'user_id' => $user,
                'quantity' => $old_resource,
                'add' => null,
                'reduce' => $quantity,
                'new_quantity' => $new_gold_save->gold,
                'date' => now()
            ]);
        }

        return back();
    }
}
