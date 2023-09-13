<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glaze extends Model
{
    use HasFactory;
    protected $table = 'glazes';
    protected $fillable = [
        'name',
        'dept',
        'shift',
        'grub',
        'density',
        'viscosity',
        'weight',
    ];
}
