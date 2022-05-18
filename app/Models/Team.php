<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';

    /**
     * Relationship with roster table.
     *
     * @return HasMany
     */
    public function rosters()
    {
        return $this->hasMany('App\Models\Roster', 'team_code', 'code');
    }
}
