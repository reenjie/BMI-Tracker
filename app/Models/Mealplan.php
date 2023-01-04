<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mealplan extends Model
{
    use HasFactory;

    protected $fillable = [
        'dayid',
        'schedule',
        'content',
        'rangeid'
    ];
}
