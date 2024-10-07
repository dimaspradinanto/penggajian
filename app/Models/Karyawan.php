<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'jabatan', 'gaji_pokok'];

    public function gajis()
    {
        return $this->hasMany(Gaji::class);
    }
}

