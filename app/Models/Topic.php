<?php

namespace App\Models;

use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;

    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_pinned' => 'boolean',
        'is_locked' => 'boolean',
    ];

    protected $dates = [
        'deleted_at',
        'last_reply_at',
    ];

    /**
     * Boot the reply instance.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($topic) {
            $topic->replies->each->delete();

            $topic->replies->each(function ($reply) {
                $reply->user->decrement('reply_count');
            });

            $topic->user->loseReputation('topic_published');
        });

        static::created(function ($topic) {
            $topic->category->increment('topic_count');
            $topic->category->update(['last_topic_id' => $topic->id]);
            // $topic->update(['last_reply_at' => now()]);
            $topic->user->increment('reply_count');
            $topic->user->gainReputation('topic_published');
        });
    }

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
     * Add a reply to the topic.
     *
     * @param array $reply
     * @return Model
     */
    public function addReply($reply)
    {
        $reply = $this->replies()->create($reply);
        return $reply;
    }

    /**
     * Get a string path for the topic
     *
     * @return string
     */
    public function path()
    {
        return "{$this->category->slug}/topic/{$this->slug}";
    }

    /**
     * Get the path to the topic as a property.
     *
     * @return string
     */
    public function getPathAttribute()
    {
        return $this->path();
    }

    /**
     * A topic belongs to one category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * A topic belongs to one user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A topic
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function firstReply()
    {
        return $this->belongsTo(Reply::class, 'first_reply_id');
    }

    /**
     * A topic has one last reply.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function lastReply()
    {
        return $this->belongsTo(Reply::class, 'last_reply_id');
    }

    /**
     * A topic has many replies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    /**
     * A topic has many likes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * The topic is liked by the user.
     */
    public function isLikedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function isSolved()
    {
        return $this->solved;
    }

    public function hasUpdatesFor(User $user = null)
    {
        $key = $user ? $user->visitedTopicCacheKey($this) : null;

        return $this->updated_at > cache($key);
    }

    // Get the user that made the last reply of the topic
    public function lastReplyUser()
    {
        return $this->hasOneThrough(User::class, Reply::class, 'topic_id', 'id', 'id', 'user_id');
    }

    public function hasBeenViewedByUser(User $user)
    {
        return $this->views->contains('user_id', $user->id);
    }

}
