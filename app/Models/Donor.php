<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    protected $table = 'donors';

    protected $fillable = [
        'id',
        'user_id',
        'amount_donated'
        ];
}
