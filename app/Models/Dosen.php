<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $lable = 'dosens';
    protected $fillable = ['name', 'nidn', 'email', 'no_hp'];

    public function User()
    {
        return $this->hasMany(User::class, 'dosen_id', 'id');
    }

    public function Pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }

    public function Tugas()
    {
        return $this->hasMany(Tugas::class, 'dosen_id', 'id');
    }

}
