<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Views extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discus_topic_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'discus_topic_id' => 'integer',
    ];

    public function discussionTopics(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(DiscussionTopic::class, 'discus_topic_id', 'id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function discusTopic(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DiscussionTopic::class);
    }
}
