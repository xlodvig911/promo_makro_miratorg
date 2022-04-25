<?php

namespace App\Http\Controllers;


use App\Models\Promocode;
use App\Models\PromoUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        $count_promo_users = count(PromoUser::all());
        $winner_3 = Promocode::where('winner', 3)->first();
        $winner_3_data = [];
        if(isset($winner_3)) {
            $winner_3_data['name'] = $winner_3->promo_users->name;
            $winner_3_data['region'] = $winner_3->promo_users->region->name;
            $winner_3_data['promocode'] = $winner_3->promocode;
        }

        $winner_2 = Promocode::where('winner', 2)->first();
        $winner_2_data = [];
        if(isset($winner_2)) {
            $winner_2_data['name'] = $winner_2->promo_users->name;
            $winner_2_data['region'] = $winner_2->promo_users->region->name;
            $winner_2_data['promocode'] = $winner_2->promocode;
        }

        $winner_1 = Promocode::where('winner', 1)->first();
        $winner_1_data = [];
        if(isset($winner_1)) {
            $winner_1_data['name'] = $winner_1->promo_users->name;
            $winner_1_data['region'] = $winner_1->promo_users->region->name;
            $winner_1_data['promocode'] = $winner_1->promocode;
        }
        return view('admin.index', [
            'count_promo_users' => $count_promo_users,
            'winner_3_data' => $winner_3_data,
            'winner_2_data' => $winner_2_data,
            'winner_1_data' => $winner_1_data,
            ]);
    }

    public function login() {
        return view('admin.login');
    }

    public function login_verify(Request $request) {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
//        MaKrO_AdmiN_2022
        $login = $request->input('login');
        $password = $request->input('password');
        $admin_login = User::where('login', $login)->first();
        if(isset($admin_login)) {
            if(Auth::attempt(['login' => $login, 'password' => $password, 'role_id' => 2])) {
                $request->session()->regenerate();
                return redirect()->intended('admin');
            } else {
                return back()->withErrors([
                    'password' => 'Неверный пароль',
                ]);
            }
        } else {
            return back()->withErrors([
                'login' => 'Неверный логин',
            ]);
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
