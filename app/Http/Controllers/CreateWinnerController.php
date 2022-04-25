<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use Illuminate\Http\Request;

class CreateWinnerController extends Controller
{
    public function winner_3(Request $request)
    {
        $all_promocodes = count(Promocode::all());
        $winner_3 = Promocode::where('winner', 3)->first();
        $available_user_id_array = Promocode::where('winner', null)->pluck('id')->toArray();
        if (!isset($winner_3)) {
            foreach ($available_user_id_array as $user_id) {
                $randomize = rand(1, $all_promocodes);
                if($randomize == $user_id) {
                    $create_winner_1 = Promocode::where('id', $randomize)->update([
                        'winner' => 1,
                    ]);
                    return back()->with('success', "Победителем номер 1 - $randomize");
                }
            }
        }
        $winner_3_promocode = $winner_3->promocode;
        return back()->with('success', "Победителем номер 3 стал промокод - $winner_3_promocode");
    }

    public function winner_2(Request $request)
    {
        $all_promocodes = Promocode::all();
        $winner_2 = Promocode::where('winner', 2)->with('promo_users')->first();
        if (!isset($winner_2)) {
            while (back()) {
                $randomize = rand(1, count($all_promocodes));
                $random_user = Promocode::where('id', $randomize)->first();
                if ($random_user->winner == null) {
                    $create_winner_2 = Promocode::where('id', $randomize)->update([
                        'winner' => 2,
                    ]);
                    return back()->with('success', "Победителем номер 2 - $randomize");
                }
            }
        }
        $winner_2_promocode = $winner_2->promocode;
        return back()->with('success', "Победителем номер 2 стал промокод - $winner_2_promocode");
    }

    public function winner_1(Request $request)
    {
        $all_promocodes = Promocode::all();
        $winner_1 = Promocode::where('winner', 1)->with('promo_users')->first();
        if (!isset($winner_1)) {
            while (back()) {
                $randomize = rand(1, count($all_promocodes));
                $random_user = Promocode::where('id', $randomize)->first();
                if ($random_user->winner == null) {
                    $create_winner_1 = Promocode::where('id', $randomize)->update([
                        'winner' => 1,
                    ]);
                    return back()->with('success', "Победителем номер 1 - $randomize");
                }
            }
        }
        $winner_1_promocode = $winner_1->promocode;
        return back()->with('success', "Победителем номер 1 стал промокод - $winner_1_promocode");
    }
}
