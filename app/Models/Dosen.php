<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $lable = 'dosens';
    protected $fillable = ['name', 'nidn', 'email', 'no_hp', 'user_id'];

    public function User()
    {
        // return $this->hasMany(Dosen::class, 'dosen_id', 'id');
        return $this->belongsTo(User::class, 'user_id', 'id');

    }

}
