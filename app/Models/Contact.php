<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * Remove default timestamps
     *
     * @var boolean
     */
    public $timestamps = false;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contact';

    /**
     * Array of data that is mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'firstname',
        'lastname'
    ];
}
