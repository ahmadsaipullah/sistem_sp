<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class statusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::Create( [
            'status' => 'Approve',

        ]);

        Status::Create( [

            'status' => 'Rejected',

        ]);

        Status::Create( [

            'status' => 'Pending'
        ]);
    }
}
