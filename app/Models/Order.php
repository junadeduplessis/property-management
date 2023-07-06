<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
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
    protected $table = 'order';

    /**
     * Array of data that is mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'created',
        'updated',
        'address1',
        'address2',
        'address3',
        'town',
        'postcode',
        'tags',
        'data'
    ];

    /**
     * Get the contact of this order.
     */
    public function orderContactIndex()
    {
        return $this->hasMany('App\Models\ContactIndex', 'orderId', 'id');
    }
}
