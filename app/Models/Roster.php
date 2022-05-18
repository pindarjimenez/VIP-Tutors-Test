<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    protected $table = 'roster';

    /**
     * Relationship with player_totals table.
     *
     * @return hasOne
     */
    public function statistic()
    {
        return $this->hasOne('App\Models\PlayerTotal', 'player_id');
    }

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
}
