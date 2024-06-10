<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushSubscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'endpoint', 'keys'];
    protected $table = 'push_subscriptions';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getEndpoint()
    {
        return $this->endpoint;
    }
    public function getKeys()
    {
        return $this->keys;
    }

}