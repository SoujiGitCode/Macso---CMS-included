<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model {
    /**
     * Name of the table
     * @var type 
     */
    protected $table = 'roles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

}
