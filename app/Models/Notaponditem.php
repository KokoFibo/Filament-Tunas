<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notaponditem extends Model
{
    use HasFactory;
    protected $table = 'notaponditem';
    protected $guarded = [];

    // public function hargapond()
    // {
    //     return $this->belongsTo(Hargapond::class);
    // }
    // public function notapond()
    // {
    //     return $this->belongsTo(Notapond::class);
    // }
}
