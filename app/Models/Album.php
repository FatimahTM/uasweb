<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory,HasUuids;

    protected $fillable = [
        'nama',
        'album_id',
        'tahun_keluar'
    ];
    public function artist(){
        return $this->belongsTo(Artist::class,'artist_id');
    }
}
