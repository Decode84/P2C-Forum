<?php

namespace App\Models;


use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;

    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Boot the reply instance.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($reply) {
            $reply->topic->increment('reply_count');
            $reply->user->increment('reply_count');
            $reply->user->gainReputation('reply_posted');
        });

        static::deleting(function ($reply) {
            $reply->topic->decrement('reply_count');
            $reply->user->decrement('reply_count');
            $reply->user->loseReputation('reply_posted');
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

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        $perPage = config('forum.pagination.perPage');
        $replyPosition = $this->topic->replies()->pluck('slug')->search($this->slug);
        $page = ceil(($replyPosition + 1) / $perPage);
        // $page = ceil($replyPosition / $perPage);
        return $this->topic->path() . "?page={$page}#reply-{$this->slug}";
    }

    public function getPathAttribute()
    {
        return $this->path();
    }
}
