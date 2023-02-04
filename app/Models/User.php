<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use App\Traits\HasReputation;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasReputation, HasRoles;

    /**
     * Eager load relationships
     *
     * @var array
     */
    protected $with = ['profile'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'bio',
        'email',
        'avatar',
        'cover'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'last_seen_time',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'hwid',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'reputation' => 'integer',
    ];

    /**
     * Get the route key name for Laravel.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    public function rename(string $username)
    {
        if ($username != $this->username) {
            $this->username = $username;
            $this->save();
        }
    }

    public function changeemail(string $email)
    {
        if ($email != $this->email) {
            $this->email = $email;
            $this->save();
        }
    }

    public function changePassowrd(string $password)
    {
        $this->password = $password;
        $this->save();
    }

    public function checkPassword(string $password)
    {
    }

    public function updateLastSeen()
    {
        if ($this->last_seen_at === null || $this->last_seen_at->diffInSeconds(Carbon::now()) > 180) {
            $this->last_seen_at = Carbon::now();
            $this->save();
        };
    }

    public function isGuest()
    {
        return false;
    }

    /**
     * A user has many replies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * A user has many topics.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    public function awards(): BelongsToMany
    {
        return $this->belongsToMany(Award::class);
    }

    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function level()
    {
        $level = 0;
        $reputation = $this->reputation;

        while ($reputation >= 0) {
            $level++;
            $reputation -= $level * 100;
        }

        return $level;
    }

    public function read($topic)
    {
        cache()->forever(
            $this->visitedTopicCacheKey($topic),
            \Carbon\Carbon::now()
        );
    }

    public function visitedTopicCacheKey($topic)
    {
        return sprintf('users.%s.visits.%s', $this->id, $topic->id);
    }
}
