<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email'=>'admin@example.com'],[
            'nama'=>'Admin', 'password'=>Hash::make('password'), 'role'=>'admin'
        ]);
        User::updateOrCreate(['email'=>'dokter@example.com'],[
            'nama'=>'Dokter', 'password'=>Hash::make('password'), 'role'=>'dokter'
        ]);
        User::updateOrCreate(['email'=>'pasien@example.com'],[
            'nama'=>'Pasien', 'password'=>Hash::make('password'), 'role'=>'pasien'
        ]);
    }
}
