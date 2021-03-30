<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rusys extends Model
{
    use HasFactory;

    public function rusysHasManagers()
    {
        return $this->hasMany('App\Models\Manager', 'rusys_id', 'id');
    }
}