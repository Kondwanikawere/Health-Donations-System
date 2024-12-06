<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'goal_amount', 'raised_amount', 'status', 'created_by', 'patient_id'
    ];

    /**
     * Get the user (health worker) who created the campaign.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the patient for whom the campaign was created.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
