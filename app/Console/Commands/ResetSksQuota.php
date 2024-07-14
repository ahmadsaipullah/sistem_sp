<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class ResetSksQuota extends Command
{
    protected $signature = 'reset:sksquota';
    protected $description = 'Reset kuota SKS untuk semua user';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        User::query()->update(['sks' => 0]);
        $this->info('Kuota SKS telah direset untuk semua user.');
    }
}

