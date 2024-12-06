<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'Patients';

    protected $fillable = [
        'firstName',
        'surname',
        'disease',
        'amount',
        'isAccepted',
        'amount_remaining'
        ];
}
