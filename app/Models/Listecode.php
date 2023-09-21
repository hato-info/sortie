<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listecode extends Model
{
    use HasFactory;
    protected $fillable = [
        'eleve_id','photo'
    ];
}
