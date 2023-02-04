<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $dates = [
        'deleted_at',
        'last_reply_at',
    ];

    /**
     * Get the route key name for Laravel.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the title for the thread.
     *
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * A category belongs to one section.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * A category contains many topics.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    /**
     * A category contains many replies, through its topics.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function replies()
    {
        return $this->hasManyThrough(Reply::class, Topic::class);
    }

    /**
     * A category has a single last reply user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lastReply()
    {
        return $this->hasOne(Reply::class, 'id', 'last_reply_id');
    }

    public function lastTopic()
    {
        return $this->hasOne(Topic::class, 'id', 'last_topic_id');
    }

    public function lastTopicUser()
    {
        return $this->hasOne(User::class, 'id', 'last_topic_user_id');
    }

    /**
     * A category has a single last reply user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lastReplyUser()
    {
        return $this->hasOne(Reply::class, 'id', 'last_reply_user_id');
    }

    // Get the topic that has the last reply
    public function lastReplyTopic()
    {
        return $this->hasOneThrough(Topic::class, Reply::class, 'topic_id', 'id', 'id', 'topic_id')->latest();
    }

    // Get the user that has the last reply in this category
    public function lastReplyUserCategory()
    {
        return $this->hasOneThrough(User::class, Reply::class, 'user_id', 'id', 'id', 'user_id')->latest();
    }
}
