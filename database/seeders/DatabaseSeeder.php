<?php

namespace Database\Seeders;


use App\Models\Promocode;
use App\Models\Region;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Promocodes
//        Promocode::factory(100)->create();

        // Regions create
        // Region::factory(1)->create();
        $regions = [
            ['name' => "Ташкент и Ташкентская область"],
            ['name' => "Бухарская область"],
            ['name' => "Ферганская область"],
            ['name' => "Джизакская область"],
            ['name' => "Наманганская область"],
            ['name' => "Навоийская область"],
            ['name' => "Кашкадарьинская область"],
            ['name' => "Самаркандская область"],
            ['name' => "Сырдарьинская область"],
        ];
        Region::insert($regions);

        // Role
        $roles = [
            ['name' => 'user'],
            ['name' => 'admin'],
            ['name' => 'operator'],
            ['name' => 'hr'],
        ];
        Role::insert($roles);

        // Admin
        User::create([
            'login' => 'admin',
            'password' => Hash::make('admin'),
            'role_id' => 2,
        ]);
    }
}
