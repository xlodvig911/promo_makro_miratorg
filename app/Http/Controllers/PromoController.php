<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use App\Models\PromoUser;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    public function index()
    {
        $regions = Region::all();
        return view('promo.index', compact('regions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'promo_user_name' => 'required|min:2',
            'promo_user_phone_number' => 'required',
            'promo_user_region' => 'required',
            'promo_code' => 'required',
        ]);

        $promocode = $request->input('promo_code');
        $region_id = $request->input('promo_user_region');
        $user = $request->input('promo_user_name');
        if (substr($promocode, 0, 3) == 479 && strlen($promocode) == 12) {
            $has_promocode = Promocode::where('promocode', $promocode)->first();
            if(isset($has_promocode)) {
                return redirect()->route('promo.index')->withErrors([
                    "promo_code" => "Этот промокод уже активирован"
                ]);
            }
            $phone_number = preg_replace('/[^a-zа-яё\d]/ui', '',
                $request->input('promo_user_phone_number'));
            if (strlen($phone_number) == 9 && gettype((int)$phone_number) == "integer") {
                $registered_user = PromoUser::where('phone', $phone_number)->first();
                if (isset($registered_user) &&
                    $registered_user->name == $user &&
                    $registered_user->region_id == $region_id) {
                    Promocode::where('promocode', $promocode)->create([
                        'promo_user_id' => $registered_user->id,
                        'promocode' => $promocode,
                    ]);

                    return redirect()->route('promo.index')->
                    with('success', "Поздравляю вы активировали еще один промокод");
                } else {
                    $create_promo_user = PromoUser::create([
                        'name' => $user,
                        'phone' => $phone_number,
                        'region_id' => $region_id,
                    ]);

                    $promo_user_id = PromoUser::where('phone', $phone_number)
                        ->where('name', $user)
                        ->where('region_id', $region_id)
                        ->first()->id;

                    $create_promocode = Promocode::create([
                        'promocode' => $promocode,
                        'promo_user_id' => $promo_user_id,
                    ]);

                    return redirect()->route('promo.index')->
                    with('success', "Вы успешно присоединились к промо-акции");
                }
            } else {
                return redirect()->route('promo.index')->withErrors([
                    "promo_user_phone_number" => "Неверный номер телефона"
                ]);
            }
        } else {
            return back()->withErrors([
                "promo_code" => "Неверный промокод"
            ]);
        }
    }
}
