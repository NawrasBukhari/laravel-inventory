<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ZoomMeetings extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'meeting_id', 'topic', 'start_time', 'duration', 'password', 'start_url', 'join_url'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
