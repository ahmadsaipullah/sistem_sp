<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;


    protected $lable = 'tugas';
    protected $fillable = [
        'user_id',
        'dosen_id',
        'deskripsi',
        'file_path',
        'nilai'
    ];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function Dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id','id');
    }

    public function Pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
