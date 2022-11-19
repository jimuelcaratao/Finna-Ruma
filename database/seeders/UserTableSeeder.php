<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 = Admin
        User::firstOrCreate([
            'name' => 'Dave Azanan',
            'email' => 'dave.azanan@cbsua.edu.ph',
            'is_admin' => 1,
            'password' => Hash::make('qweqweqwe'),
        ]);

        User::firstOrCreate([
            'name' => 'Admin One',
            'email' => 'admin1@admin.com',
            'is_admin' => 1,
            'password' => Hash::make('qweqweqwe'),
        ]);

        // 2 = Host

        User::firstOrCreate([
            'name' => 'Host One',
            'email' => 'host1@host.com',
            'is_admin' => 2,
            'password' => Hash::make('qweqweqwe'),
        ]);


        // 0 = Tenant

        User::firstOrCreate([
            'name' => 'Tenant One',
            'email' => 'tenant1@tenant.com',
            'student_id' => '18-0116',
            'address' => 'Light Residences, EDSA corner Madison Street, 1550 Manila, Philippines ',
            'is_admin' => 0,
            'password' => Hash::make('qweqweqwe'),
        ]);

        User::firstOrCreate([
            'name' => 'Tenant Two',
            'email' => 'tenant2@tenant.com',
            'student_id' => '18-0117',
            'address' => 'Light Residences, EDSA corner Madison Street, 1550 Manila, Philippines ',
            'is_admin' => 0,
            'password' => Hash::make('qweqweqwe'),
        ]);
    }
}
