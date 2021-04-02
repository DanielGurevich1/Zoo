<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    // show animal specias
    public function animalRusys()
    {
        return $this->belongsTo('App\Models\Rusys', 'rusys_id', 'id');
    }
    // show animal manager
    public function animalManager()
    {
        return $this->belongsTo('App\Models\Manager', 'manager_id', 'id');
    }
    public function animaHasSpecialManager()
    {
        return $this->belongsTo('App\Models\Manager', 'manager_id', 'id');
    }
    use HasFactory;
}
