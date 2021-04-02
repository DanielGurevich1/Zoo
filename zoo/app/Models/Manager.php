<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;
    public function rusysManager()
    {
        return $this->belongsTo('App\Models\Rusys', 'rusys_id', 'id');
    }
    // used in destry validation
    public function managerHasAnimals()
    {
        return $this->hasMany('App\Models\Animal', 'manager_id', 'id');
    }
}