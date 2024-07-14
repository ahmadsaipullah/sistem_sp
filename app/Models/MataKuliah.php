<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $lable = 'mata_kuliahs';
    protected $fillable = ['dosen_id', 'matkul', 'sks', 'harga'];


    public function Dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'id');
    }

    public function Pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'matkul_id', 'id');
    }
}
