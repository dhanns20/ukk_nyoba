<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    protected $fillable = ['siswa_id', 'industri_id', 'guru_id', 'mulai', 'selesai'];

    public function siswa ()
    {
        return $this->belongsTo(siswa::class);
    }

    public function industri ()
    {
        return $this->belongsTo(industri::class);
    }

    public function guru ()
    {
        return $this->belongsTo(guru::class);
    }

    //membuat trigger
    public static function booted(): void {
        static::created(function (pkl $pkl) {
            $pkl->siswa()->update(['status_pkl' => '1']);
        });
    }
}



