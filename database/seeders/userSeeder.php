<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::Create( [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'nim' => '2055201058',
            'no_hp' => '087880182823',
            'level_id' => '1',
            'gender' => 'pria',
            'password' => Hash::make(123456789),

        ]);
        User::Create( [
            'name' => 'Prodi',
            'email' => 'prodi@gmail.com',
            'nim' => '2055201051',
            'no_hp' => '087880182823',
            'level_id' => '2',
            'gender' => 'pria',
            'password' => Hash::make(123456789),

        ]);
        User::Create( [
            'name' => 'Dosen',
            'email' => 'dosen@gmail.com',
            'nim' => '2055201052',
            'no_hp' => '087880182823',
            'level_id' => '3',
            'gender' => 'pria',
            'password' => Hash::make(123456789),

        ]);
        User::Create( [
            'name' => 'Akademik',
            'email' => 'akademik@gmail.com',
            'nim' => '2055201053',
            'no_hp' => '087880182823',
            'level_id' => '4',
            'gender' => 'pria',
            'password' => Hash::make(123456789),

        ]);
        User::Create( [
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'nim' => '2055201054',
            'no_hp' => '087880182823',
            'level_id' => '5',
            'gender' => 'pria',
            'password' => Hash::make(123456789),

        ]);





    }
}
