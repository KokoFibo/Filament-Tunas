<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hargapond extends Model
{
    use HasFactory;
    protected $table = 'hargapond';
    protected $guarded = [];

    public function notaponditem()
    {
        $this->hasMany(Notaponditem::class);
    }
    public function notapond()
    {
        return $this->hasMany(Notapond::class);
    }
}
