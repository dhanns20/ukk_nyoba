<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    protected $fillable = [
        'nama',
        'kelas',
        'nis',
        'gender',
        'alamat',
        'kontak',
        'email',
        'status_pkl',
    ];
    
    public function pkl()
    {
        return $this->hasMany(Pkl::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

}
