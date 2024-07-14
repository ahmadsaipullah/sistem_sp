<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $lable = 'statuss';
    protected $fillable = ['status'];

    public function Pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }
}
