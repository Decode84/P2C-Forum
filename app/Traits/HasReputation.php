<?php

namespace App\Traits;

/**
 * Undocumented trait
 */
trait HasReputation
{
    public function gainReputation($action)
    {
        $this->increment('reputation', config("forum.reputation.{$action}"));
    }

    public function loseReputation($action)
    {
        $this->decrement('reputation', config("forum.reputation.{$action}"));
    }
}
