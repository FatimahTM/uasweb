<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lagu extends Model
{
    use HasFactory,HasUuids;

    protected $fillable = [
        'title',
        'artist_id',
        // add other attributes that you want to be mass assignable
    ];
}
