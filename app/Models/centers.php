<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centers extends Model
{
    use HasFactory;


    protected $table="centers";

    protected $fillable = [
        'name',
        'phone',
        'image',
        'address',
        'works',
    ];


}
