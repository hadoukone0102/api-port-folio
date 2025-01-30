<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class second_test extends Model
{
    /** @use HasFactory<\Database\Factories\SecondTestFactory> */
    use HasFactory;
    protected $table = "second_tests";
    protected $fillable = [
        'name',
        'lastName',
        'phone',
    ];
}
