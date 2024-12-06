<?php

// app/Models/DonationCampaign.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image', 'target_amount', 'category', 'location',
        'completion_date', 'is_urgent', 'donations_made', 'number_of_donors', 'user_id'
    ];

    // Link to the organizer/health worker (User model)
    public function organizer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Link to comments made on the campaign
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
