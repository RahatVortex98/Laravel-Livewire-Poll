<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /** @use HasFactory<\Database\Factories\OptionFactory> */
    use HasFactory;


    protected $guarded = [];
    Public function poll(){
        return $this->belongsTo(Poll::class);
    }
    Public function votes(){
        return $this->hasMany(Vote::class);
    }
}
