<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Notapond extends Model
{
    use HasFactory;
    protected $table = 'notapond';
    protected $guarded = [];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function notaponditem(): HasMany
    {
        return $this->hasMany(related: Notaponditem::class);
    }
    public function hargapond()
    {
        return $this->belongsTo(Hargapond::class);
    }
}
