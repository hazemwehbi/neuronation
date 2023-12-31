<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Relationship with SessionExercise
     *     
     * @return object
     */
    public function exercises()
    {
        return $this->hasMany('App\Models\SessionExercise', 'category_id', 'id');
    }
}
