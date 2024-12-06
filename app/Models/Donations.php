<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Donations extends Model
{
    use HasFactory;
    protected $table = 'donations';

    protected $fillable = [
        'amount needed',
        'amount remaining',
        'mode',
        'patients_Id',
        ];
}
