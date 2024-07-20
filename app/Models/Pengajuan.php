<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengajuan extends Model
{
    use HasFactory;

    protected $lable = 'pengajuans';
    protected $fillable = ['user_id', 'dosen_id', 'matkul_id', 'sks', 'harga', 'deskripsi','verifikasi_prodi_id', 'verifikasi_akademik_id','kode'];


    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->kode = self::generateUniqueKode();
        });
    }

    public static function generateUniqueKode()
    {
        do {
            $kode = Str::random(10);
        } while (self::where('kode', $kode)->exists());

        return $kode;
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');

    }

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'id');
    }

    public function MataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'matkul_id', 'id');
    }

    public function scopeUserSKS($query, $userId)
    {
        return $query->where('user_id', $userId)
                    ->whereYear('created_at', Carbon::now()->year)
                    ->sum('sks');
    }

    public function Tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
