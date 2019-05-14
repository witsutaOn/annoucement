<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $table = 'follower';

    public function getTable()
    {
        return $this->table;
    }
}
