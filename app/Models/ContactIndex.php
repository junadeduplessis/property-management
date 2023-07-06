<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactIndex extends Model
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
    protected $table = 'contact_idx';

    /**
     * Array of data that is mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'orderId',
        'contactId'
    ];

    /**
     * Get the contact of this order.
     */
    public function contact()
    {
        return $this->hasMany('App\Models\Contact', 'id', 'contactId');
    }
}
